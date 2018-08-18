<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use App\User;
use App\Catagory;
use Auth;



class VideoController extends Controller
{
    public function index(){
    	$videos=Videos::orderBy("id","desc")->where('request',0)->paginate(20);
    	$title="Videos";

        for ($i=0;$i<count($videos);$i++) {
                $author=User::where('email',$videos[$i]->uploader_email)->first();
                $videos[$i]->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
            
    	return view("video.videoList")->with(compact("title","videos","catagories"));
    }

    public function viewVideo($id){
    	$video=Videos::where("id",$id)->first();
    	
    	if($video!=null){

            $total_view=$video->total_view+1;
            $viewer_id=$video->viewer_id;

            $viewer_id=$this->checkUserinViewerList($viewer_id);

            Videos::where("id",$id)->update([
                "total_view"=>$total_view,
                "viewer_id"=>$viewer_id
            ]);

            $related_videos= videos::where("catagory_id",$video->catagory_id)->orderBy("id","desc")->limit(6)->get();

            for($i=0;$i<count($related_videos);$i++) {
                $author=User::where('email',$related_videos[$i]->uploader_email)->first();
                $related_videos[$i]->author=$author->first_name." ".$author->last_name;
            }

            $catagory=Catagory::where("id",$video->catagory_id)->first();
            $video->catagory_name=$catagory->catagory_name;


            $title=$video->file_name;
            $author=User::where("email",$video->uploader_email)->first();
            return view("video.viewVideo")->with(compact("title","video","author","related_videos"));
        }
        else{
            return redirect("/videos");
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

    public function catagoryVideo($id){
    	$videos=Videos::where("catagory_id",$id)->where('request',0)->orderBy("id","desc")->paginate(20);
    	$catagory=Catagory::where("id",$id)->first();
    	
    	if($catagory!=null){
            $title=$catagory->catagory_name;
        }
        else{
            $title="Not found";
            return redirect("/videos");
        }

        for ($i=0;$i<count($videos);$i++) {
                $author=User::where('email',$videos[$i]->uploader_email)->first();
                $videos[$i]->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
            
        return view("video.videoList")->with(compact("title","videos","catagories"));
    }

    public function authorVideo($email){
    	$videos=Videos::where("uploader_email",$email)->where('request',0)->orderBy("id","desc")->paginate(20);
    	$author=User::where("email",$email)->first();

    	if($author!=null){
    		$title=$author->first_name." ".$author->last_name;
    	}
    	else{
    		$title="No author found";
    	}

        foreach ($videos as $video) {
                $video->author=$title;
            }

        $catagories=Catagory::get();
            
        return view("video.videoList")->with(compact("title","videos","catagories"));
    }

    public function show_video_editor_form($id){
        $categories  = Catagory::where('root_id',0)->get();
        $video  = Videos::where('id',$id)->first();

        if(Auth::user()->email == $video->uploader_email || Auth::user()->user_type == 'admin'){

            return view('video.editVideo')->with(compact("categories", "video"));
        }
        else{
            return redirect()->back();
        }

    }

    public function editVideo(Request $request){
        $id = $request->id;
        $video  = Videos::where('id',$id)->first();

        if(Auth::user()->email == $video->uploader_email || Auth::user()->user_type == 'admin'){
            $this->validate($request, [
                'file_name' => 'required',
                'file' => 'mimes:mp4',
                'thumbnail' => 'mimes:jpg,png,jpeg'
            ]);

            Videos::where('id',$id)->update([
                'file_name' => $request->file_name
            ]);

            //if user update category id
            if($request->catagory_id != null){
                Videos::where('id',$id)->update([
                    'catagory_id' => $request->catagory_id
                ]);
            }

            //if user upload new file, save it to the existing file
            if($request->file != null){
                $request->file->storeAs('public/files/videos',$video->file);
            }

            //if user upload new banner, save it to the existing file
            if($request->thumbnail != null){
                $request->thumbnail->storeAs('public/thumbnail/videos',$video->thumbnail);
            }

            return redirect()->back()->withErrors('Video updated successfully');
        }
        else{
            return redirect()->back();
        }
    }   

    public function downloadVideo($id){
    	$video=Videos::where("id",$id)->first();
    	$path=storage_path("app/public/files/videos/".$video->file);
      	return response()->download($path);
    }
}
