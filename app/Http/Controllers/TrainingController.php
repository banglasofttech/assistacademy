<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;
use App\User;
use App\Catagory;
use App\Training;
use App\Review;
use App\Comment;
use Illuminate\Support\Facades\Storage;
use Auth;

class TrainingController extends Controller
{
    public function index(){
        $trainings=Training::orderBy("id","desc")->paginate(20);
        $title="Trainings";

         for ($i=0;$i<count($trainings);$i++) {
                $author=User::where('email',$trainings[$i]->uploader_email)->first();
                $trainings[$i]->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
        return view("training.trainingList")->with(compact("title","trainings","catagories"));
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

            $related_trainings= Training::where("catagory_id",$training->catagory_id)->orderBy("id","desc")->limit(5)->get();

            $ppt_files=explode('|', $training->ppt_file);
            $video_files=explode('|', $training->video_file);
            $objectives=explode(',', $training->objective);
            $author=User::where('email',$training->uploader_email)->first();
            $catagory_name=Catagory::where('id',$training->catagory_id)->first();
            $file_ext=pathinfo( $training->introduction_file, PATHINFO_EXTENSION);

            $user_id = Auth::user()->id;

            //check current user already rated or not
            $rated = Review::where('content_id',$id)->where('user_id',$user_id)->where('type','training')->first();

            $total_rating = Review::where('content_id',$id)->where('type','training')->sum("rating");
            $total_person = Review::where('content_id',$id)->where('type','training')->count();

            if($total_person > 0){
                $avg_rating = $total_rating/$total_person;
            }
            else{
                $avg_rating = 0;
            }

            //count individual rating
            $star1 = Review::where('content_id',$id)->where('type','training')->where("rating",1)->count();
            $star2 = Review::where('content_id',$id)->where('type','training')->where("rating",2)->count();
            $star3 = Review::where('content_id',$id)->where('type','training')->where("rating",3)->count();
            $star4 = Review::where('content_id',$id)->where('type','training')->where("rating",4)->count();
            $star5 = Review::where('content_id',$id)->where('type','training')->where("rating",5)->count();

            //get all review
            $all_review = Review::where('content_id',$id)->where('type','training')->orderBy("id","desc")->limit(10)->get();
            $reviewed_users = null;
            $i=0;

            //get reviewed user information
            foreach ($all_review as $single_review) {
                $reviewed_users[$i] = User::where("id",$single_review->user_id)->first();
                $i++;
            }

            //total comment
            $total_comment = Comment::where('content_id',$id)->where('type','training')->count();
             //get all review
            $all_comment = Comment::where('content_id',$id)->where('type','training')->orderBy("id","desc")->limit(10)->get();
            $commented_users = null;
            $i=0;

             //get commented user information
            foreach ($all_comment as $single_comment) {
                $commented_users[$i] = User::where("id",$single_comment->user_id)->first();
                $i++;
            }

            return view("training.viewTraining")->with(compact("training","author","related_trainings","ppt_files","video_files","objectives","catagory_name","file_ext","rated","avg_rating","star2","star3","star4","star1","star5","all_review","reviewed_users","total_comment", "commented_users", "all_comment"));

        }
        else{
            return redirect("/training");
        }
    }

    public function previewTraining($id){
        $training=Training::where("id",$id)->first();

        if($training!=null){
            $author=User::where('email',$training->uploader_email)->first();
            $objectives=explode(',', $training->objective);
            $file_ext=pathinfo( $training->introduction_file, PATHINFO_EXTENSION);

            $total_rating = Review::where('content_id',$id)->where('type','training')->sum("rating");
            $total_person = Review::where('content_id',$id)->where('type','training')->count();

            if($total_person > 0){
                $avg_rating = $total_rating/$total_person;
            }
            else{
                $avg_rating = 0;
            }

            return view("training.previewTraining")->with(compact("training","author","avg_rating","objectives","file_ext"));

        }
        else{
            return redirect("/training");
        }
    }

    private function checkUserinViewerList($viewer_id){
        if(Auth::user()){
            $user_id=','.Auth::user()->id;
            
            //if current user id is not in viewer id list, add it
            if(!strpos($viewer_id, $user_id)){
                $viewer_id=$viewer_id.$user_id;
            }
            return $viewer_id;
        }

    }

    public function catagorywiseTraining($id){
        $trainings=Training::where("catagory_id",$id)->orderBy("id","desc")->paginate(20);;
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

        $catagories=Catagory::get();
        return view("training.trainingList")->with(compact("title","trainings","catagories"));
    }

     public function authorwiseTraining($email){
        $trainings=Training::where("uploader_email",$email)->orderBy("id","desc")->paginate(20);
        $author=User::where("email",$email)->first();

        if($author!=null){
            $title=$author->first_name." ".$author->last_name;
        }
        else{
            $title="Not found";
        }

        for ($i=0;$i<count($trainings);$i++) {
                $trainings[$i]->author=$title;
            }

        $catagories=Catagory::get();
        return view("training.trainingList")->with(compact("title","trainings","catagories"));
    }

    public function addTrainingView(){
        $catagories=Catagory::where("root_ID","0")->get();
        
        return view("training.addtraining")->with("catagories",$catagories);
    }

    public function addTraining(Request $request){
    	$this->validate($request,[
    		'catagory_id'=>'required',
    		'title'=>'required|max:255',
    		'trainer_description'=>'required',
    		'fee'=>'required|integer',
    		'uploader_email'=>'required',
            'duration'=>'required|integer',
            'duration_type'=>'required',
            'objective'=>'required',
            'introduction_text'=>'required',
            'introduction_file' => 'mimes:mp4,ppt,pdf',
    		'thumbnail'=>'required|mimes: jpg,png,jpeg',
    	]);


        $type=Auth::user()->user_type;

        //get uploaded files
        $ppts=$request->ppt_files;
        $videos=$request->video_files;


        //validate uploaded file arrray with the following function
        $this->validatePPTs($ppts);
        $this->validateVideos($videos);

        //inintilize variable to store uploaded file name
        $ppt_file="";
        $video_file="";
        $introduction_file_name="";

    	//add to database
    	$training_id=Training::create($request->all())->id;

        $thumbnail=$request->thumbnail;
    	$name=$training_id."_".$request->title;

    	//store banner
    	$thumbnail->storeAs('public/thumbnail/training',$name.'.'.$thumbnail->extension());

        //save introduction file to storage
        if($request->hasFile('introduction_file')){
            $introduction_file=$request->introduction_file;
            $introduction_file_name=$name."_introduction_file".".".$introduction_file->extension();
            $introduction_file->storeAs('public/files/training/introduction_files',$introduction_file_name);
        }

        //add video to storage and concate names in video_file
        if(!empty($videos)){
            foreach ($videos as $video) {
                $file_name=$video->getClientOriginalName();
                $video_file.=$file_name."|";
        
                $video->storeAs('public/files/training/videos',$file_name);
            }
        }

        
        //add ppt to storage and concate names in ppt_file
        if(!empty($ppts)){
            foreach ($ppts as $ppt) {
                $file_name=$ppt->getClientOriginalName();
                $ppt_file.=$file_name."|";
                $ppt->storeAs('public/files/training/ppts',$file_name);
            }
        }

    	//update database with file name
    	
        if ($type == 'admin') {
                Training::where('id',$training_id)->update([
                    "introduction_file" => $introduction_file_name,
                    "ppt_file" => $ppt_file,
                    "video_file" => $video_file,
                    "thumbnail" => $name,
                    "viewer_id" => "0",
                    "request" => "0"
                ]);
        }
        else{
            Training::where('id',$training_id)->update([
                "introduction_file" => $introduction_file_name,
                "ppt_file" => $ppt_file,
                "video_file" => $video_file,
                "thumbnail" => $name,
                "viewer_id" => "0"
            ]);
        }

        if ($type == 'admin') {
           return redirect()->back()->withErrors('Training added successfully');
        }
        else{
            return redirect()->back()->withErrors('Training added successfully. Please wait for admin confirmation');
        }
    }

    private function validatePPTs($ppts){
        if(!empty($ppts)){
            foreach ($ppts as $ppt) {
                if(!($ppt->extension()=="ppt" || $ppt->extension()=="pptx")){
                    return redirect('/addcourse')->withErrors("Course Material PPT must be in ppt/pptx format");
                }
            }
        }
    }

    private function validateVideos($videos){
            if(!empty($videos)){
            foreach ($videos as $video) {
                if(!($video->extension()=="mp4")){
                    return redirect('/addcourse')->withErrors("Course Material Videos must be in mp4 format");
                }
            }
        }
    }

    public function viewComment($id){
        $title = Training::where('id',$id)->first()->title;

        if($title != null){

            //total comment
            $total_comment = Comment::where('content_id',$id)->where('type','training')->count();

             //get all review
            $all_comment = Comment::where('content_id',$id)->where('type','training')->orderBy("id","desc")->paginate(50);

            $commented_users = null;
            $i=0;

             //get commented user information
            foreach ($all_comment as $single_comment) {
                $commented_users[$i] = User::where("id",$single_comment->user_id)->first();
                $i++;
            }

            return view('comments')->with(compact("title", "total_comment", "commented_users", "all_comment"));

        }
        return required()->back()->withErrors("Invalid training id");
    }

    public function viewReview($id){
        $title = Training::where('id',$id)->first()->title;

        if($title != null){

            //total comment
            $total_review = Review::where('content_id',$id)->where('type','training')->count();

             //get all review
            $all_review = Review::where('content_id',$id)->where('type','training')->orderBy("id","desc")->paginate(50);

            $reviewed_users = null;
            $i=0;

             //get commented user information
            foreach ($all_review as $single_review) {
                $reviewed_users[$i] = User::where("id",$single_review->user_id)->first();
                $i++;
            }

            return view('reviewes')->with(compact("title", "total_review", "reviewed_users", "all_review"));

        }
        return required()->back()->withErrors("Invalid training id");
    }


    public function show_training_editor_form($id){
        $categories  = Catagory::where('root_id',0)->get();
        $training = Training::where('id',$id)->first();

        if($training != null && (Auth::user()->email == $training->uploader_email || Auth::user()->user_type == 'admin')){


            $ppt_files=explode('|', $training->ppt_file);
            $video_files=explode('|', $training->video_file);

            return view('training.editTraining')->with(compact("categories", "training","video_files","ppt_files"));
        }
        else{
            return redirect()->back();
        }

    }

    public function editTraining(Request $request){
        $id = $request->id;
        $training  = Training::where('id',$id)->first();

        if(Auth::user()->email == $training->uploader_email || Auth::user()->user_type == 'admin'){
            $this->validate($request, [
                'title' => 'required',
                'duration' => 'required|integer',
                'fee' => 'required|integer',
                'trainer_description' => 'required',
                'objective' => 'required',
                'introduction_text' => 'required',
                'introduction_file' => 'mimes:ppt,mp4,pdf',
                'thumbnail' => 'mimes:jpg,png,jpeg'
            ]);

            Training::where('id',$id)->update([
                'title' => $request->title,
                'duration' => $request->duration,
                'fee' => $request->fee,
                'introduction_text' => $request->introduction_text,
                'trainer_description' => $request->trainer_description
            ]);

            $name = $id."_".$request->title;

            //if user update category id
            if($request->catagory_id != null){
                Training::where('id',$id)->update([
                    'catagory_id' => $request->catagory_id
                ]);
            }

            //if user update duration type
            if($request->duration_type != null){
                Training::where('id',$id)->update([
                    'duration_type' => $request->duration_type
                ]);
            }

            //if user upload new introduction file
            if($request->hasFile('introduction_file')){
                //delete old introduction file
                Storage::delete('public/files/training/introduction_files/'.$training->introduction_file);

                //Save new introduction file
                $introduction_file=$request->introduction_file;
                $introduction_file_name=$name."_introduction_file".".".$introduction_file->extension();
                $introduction_file->storeAs('public/files/training/introduction_files',$introduction_file_name);

                //update database
                Training::where('id',$id)->update([
                    'introduction_file' => $introduction_file_name
                ]);
            }

            //if user delete any old video
            $current_video_file = $training->video_file;
            if($request->removed_video != null){
                //make name to array
                $removed_videos = explode('|', $request->removed_video);
                //removed removed video from storage folder.
                for($i=1; $i<count($removed_videos); $i++){
                    $video = '/public/files/training/videos/'.$removed_videos[$i-1];
                    Storage::delete($video);
                }

                //current video file name
                $current_video_file = str_replace($request->removed_video,"",$current_video_file);
            }

            //if user delete any old ppt
            $current_ppt_file = $training->ppt_file;
            if($request->removed_ppt != null){
                //make name to array
                $removed_ppts = explode('|', $request->removed_ppt);
                //remove removed video from storage folder.
                for($i=1; $i<count($removed_ppts); $i++){
                    $ppt = '/public/files/training/ppts/'.$removed_ppts[$i-1];
                    Storage::delete($ppt);
                }

                //current video file name
                $current_ppt_file = str_replace($request->removed_ppt,"", $current_ppt_file);
            }

            //get uploaded files
            $ppts=$request->ppt_files;
            $videos=$request->video_files;


            //validate uploaded file arrray with the following function
            $this->validatePPTs($ppts);
            $this->validateVideos($videos);

            //add video to storage and concate names in video_file
            if(!empty($videos)){
                $new_video_files="";
                foreach ($videos as $video) {
                    $file_name=$video->getClientOriginalName();
                    $new_video_files.=$file_name."|";
                    $video->storeAs('public/files/training/videos',$file_name);
                }

                if($request->video_postion == 'before'){
                    $current_video_file = $new_video_files.$current_video_file;
                }
                else{
                    $current_video_file = $current_video_file.$new_video_files;
                }
            }

            
            //add ppt to storage and concate names in ppt_file
            if(!empty($ppts)){
                $new_ppt_files="";
                foreach ($ppts as $ppt) {
                    $file_name=$ppt->getClientOriginalName();
                    $new_ppt_files.=$file_name."|";
                    $ppt->storeAs('public/files/training/ppts',$file_name);
                }

                if($request->ppt_postion == 'before'){
                    $current_ppt_file = $new_ppt_files.$current_ppt_file;
                }
                else{
                    $current_ppt_file = $current_ppt_file.$new_ppt_files;
                }
            }

            if($current_video_file != null){
                //update database
                Training::where('id',$id)->update([
                    'video_file' => $current_video_file
                ]);
            }

            if($current_ppt_file != null){
                //update database
                Training::where('id',$id)->update([
                    'ppt_file' => $current_ppt_file
                ]);
            }

            //if user upload new banner, save it to the existing file
            if($request->thumbnail != null){
                $request->thumbnail->storeAs('public/thumbnail/training',$training->thumbnail);
            }

            return redirect()->back()->withErrors('Training updated successfully');
        }
        else{
            return redirect()->back();
        }
    }   
}
