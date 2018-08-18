<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PPTs;
use App\User;
use App\Catagory;
use Auth;


class pptController extends Controller
{
    public function index(){
    	$ppts=PPTs::orderBy("id","desc")->where('request',0)->paginate(20);
    	$title="PPTs";

        for ($i=0;$i<count($ppts);$i++) {
                $author=User::where('email',$ppts[$i]->uploader_email)->first();
                $ppts[$i]->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
            
    	return view("ppt.pptList")->with(compact("title","ppts","catagories"));
    }

    public function viewPPT($id){
    	$ppt=PPTs::where("id",$id)->first();
    	
        if($ppt!=null){
            $total_view=$ppt->total_view+1;
            $viewer_id=$ppt->viewer_id;

            $viewer_id=$this->checkUserinViewerList($viewer_id);

            PPTs::where("id",$id)->update([
                "total_view"=>$total_view,
                "viewer_id"=>$viewer_id
            ]);

            $related_ppts= PPTs::where("catagory_id",$ppt->catagory_id)->orderBy("id","desc")->limit(6)->get();

            for($i=0;$i<count($related_ppts);$i++) {
                $author=User::where('email',$related_ppts[$i]->uploader_email)->first();
                $related_ppts[$i]->author=$author->first_name." ".$author->last_name;
            }

            $catagory=Catagory::where("id",$ppt->catagory_id)->first();
            $ppt->catagory_name=$catagory->catagory_name;

            $title=$ppt->file_name;
            $author=User::where("email",$ppt->uploader_email)->first();
            return view("ppt.viewPPT")->with(compact("title","ppt","author","related_ppts"));
        }
        else{
            return redirect("/ppts");
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

    public function catagoryPPT($id){
    	$ppts=PPTs::where("catagory_id",$id)->where('request',0)->orderBy("id","desc")->paginate(20);;
    	$catagory=Catagory::where("id",$id)->first();

        if($catagory!=null){
            $title=$catagory->catagory_name;
        }
        else{
            $title="Not found";
        }

        for ($i=0;$i<count($ppts);$i++) {
                $author=User::where('email',$ppts[$i]->uploader_email)->first();
                $ppts[$i]->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
            
        return view("ppt.pptList")->with(compact("title","ppts","catagories"));
    }

    public function authorPPT($email){
    	$ppts=PPTs::where("uploader_email",$email)->where('request',0)->orderBy("id","desc")->paginate(20);
    	$author=User::where("email",$email)->first();

    	if($author!=null){
            $title=$author->first_name." ".$author->last_name;
        }
        else{
            $title="Not found";
        }

        foreach ($ppts as $ppt) {
                $ppt->author=$title;
            }

        $catagories=Catagory::get();
            
        return view("ppt.pptList")->with(compact("title","ppts","catagories"));
    }


    public function show_ppt_editor_form($id){
        $categories  = Catagory::where('root_id',0)->get();
        $ppt  = PPTs::where('id',$id)->first();

        if(Auth::user()->email == $ppt->uploader_email || Auth::user()->user_type == 'admin'){

            return view('ppt.editPPT')->with(compact("categories", "ppt"));
        }
        else{
            return redirect()->back();
        }

    }

    public function editPPT(Request $request){
        $id = $request->id;
        $ppt  = PPTs::where('id',$id)->first();

        if(Auth::user()->email == $ppt->uploader_email || Auth::user()->user_type == 'admin'){
            $this->validate($request, [
                'file_name' => 'required',
                'file' => 'mimes:ppt,pptx',
                'thumbnail' => 'mimes:jpg,png,jpeg'
            ]);

            PPTs::where('id',$id)->update([
                'file_name' => $request->file_name
            ]);

            //if user update category id
            if($request->catagory_id != null){
                PPTs::where('id',$id)->update([
                    'catagory_id' => $request->catagory_id
                ]);
            }

            //if user upload new file, save it to the existing file
            if($request->file != null){
                $request->file->storeAs('public/files/ppts',$ppt->file);
            }

            //if user upload new banner, save it to the existing file
            if($request->thumbnail != null){
                $request->thumbnail->storeAs('public/thumbnail/ppts',$ppt->thumbnail);
            }

            return redirect()->back()->withErrors('PPT updated successfully');
        }
        else{
            return redirect()->back();
        }
    }   

    public function downloadPPT($id){
    	$ppt=PPTs::where("id",$id)->first();
    	$path=storage_path("app/public/files/ppts/".$ppt->file);
      	return response()->download($path);
    }
}
