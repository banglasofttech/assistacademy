<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;
use App\User;
use App\Catagory;
use App\Training;
use Illuminate\Support\Facades\Storage;
use Auth;
class TrainingController extends Controller
{
    public function index(){
        $trainings=Training::orderBy("id","desc")->paginate(12);
        $title="Trainings";

         for ($i=0;$i<count($trainings);$i++) {
                $author=User::where('email',$trainings[$i]->uploader_email)->first();
                $trainings[$i]->author=$author->first_name." ".$author->last_name;
            }

        //return to view page
        // return view("training.trainingList")->with(compact("title","trainings"));
    }

    public function viewTraining($id){
        $training=Training::where("id",$id)->first();
        
        if($training!=null){
            $total_view=$training->total_view+1;
            $viewer_id=$training->viewer_id;

            $viewer_id=$this->checkUserinViewerList($viewer_id);

            Training::where("id",$id)->update([
                "total_view"=>$total_view,
                "viewer_id"=>$viewer_id
            ]);

            $related_trainings= Training::where("catagory_id",$training->catagory_id)->orderBy("id","desc")->limit(6)->get();

            for($i=0;$i<count($related_trainings);$i++) {
                $author=User::where('email',$related_trainings[$i]->uploader_email)->first();
                $related_trainings[$i]->author=$author->first_name." ".$author->last_name;
            }

            $catagory=Catagory::where("id",$training->catagory_id)->first();
            $training->catagory_name=$catagory->catagory_name;

            $title=$training->file_name;
            $author=User::where("email",$training->uploader_email)->first();
            
            return view("training.viewTraining")->with(compact("title","training","author","related_trainings"));
        }
        else{
            return redirect("/trainings");
        }
    }

    private function checkUserinViewerList($viewer_id){
        $user_id=','.Auth::user()->id;
        
        //if current user id is not in viewer id list, add it
        if(!strpos($viewer_id, $user_id)){
            $viewer_id=$viewer_id.$user_id;
        }

        return $viewer_id;

    }

    public function catagorywiseTraining($id){
        $trainings=Training::where("catagory_id",$id)->orderBy("id","desc")->paginate(12);;
        $catagory=Catagory::where("id",$id)->first();

        if($catagory!=null){
            $title=$catagory->catagory_name;
        }
        else{
            $title="Not found";
        }

        for ($i=0;$i<count($trainings);$i++) {
                $author=User::where('email',$trainings[$i]->uploader_email)->first();
                $trainings[$i]->author=$author->first_name." ".$author->last_name;
            }

        return view("training.trainingList")->with(compact("title","trainings"));
    }

     public function authorwiseTraining($email){
        $trainings=Training::where("uploader_email",$email)->orderBy("id","desc")->paginate(12);
        $author=User::where("email",$email)->first();

        if($author!=null){
            $title=$author->first_name." ".$author->last_name;
        }
        else{
            $title="Not found";
        }

        for ($i=0;$i<count($trainings);$i++) {
                $author=User::where('email',$trainings[$i]->uploader_email)->first();
                $trainings[$i]->author=$author->first_name." ".$author->last_name;
            }

        // return view("training.trainingList")->with(compact("title","trainings"));
    }

    public function addTrainingView(){
        $catagories=Catagory::where("root_ID","0")->get();
        
        return view("training.addtraining")->with("catagories",$catagories);
    }

    public function addTraining(Request $request){
    	$this->validate($request,[
    		'catagory_id'=>'required',
    		'title'=>'required',
    		'description'=>'required',
    		'fee'=>'required|integer',
    		'uploader_email'=>'required',
    		'file'=>'required|mimes:mp4',
    		'thumbnail'=>'required|mimes: jpg,png,jpeg',
    	]);

    	//add to database
    	$training_id=Training::create($request->all())->id;

    	$name=$training_id."_".$request->title;
    	$thumbnail=$request->thumbnail;

    	//store files 
    	$request->file->storeAs('public/files/training',$name.".mp4");
    	$thumbnail->storeAs('public/thumbnail/training',$name.'.'.$thumbnail->extension());

    	//update database with file name
    	Training::where('id',$training_id)->update([
    		'file'=>$name.".mp4",
    		'thumbnail'=>$name.".".$thumbnail->extension(),
            "viewer_id" => "0"
    	]);

    	return redirect()->back()->withErrors('Training add successfully');
    }
}
