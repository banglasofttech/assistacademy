<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Catagory;
use App\Books;
use App\Videos;
use App\Course;
use App\PPTs;
use App\User;
use App\Training;

class FileController extends Controller
{

    public function showFileUploaderForm(){
        $catagories=Catagory::where("root_ID","0")->get();
        
        return view("File.uploadFileView")->with("catagories",$catagories);
    }

    public function getSubcatagories(Request $request){
        $subcatagories=Catagory::where("root_ID",$request->catagory_id)->get();
        return response()->json([
                'status' => $subcatagories,
                'message' => "Success"
            ], 200);
    }

    public function addCatagory(Request $request){

         $this->validate($request,[
                'catagory_name' => 'required',
            ]);
        
        Catagory::create($request->all());

        return redirect()->back();
    }

    public function uploadFile(Request $request){
        $this->validate($request,[
                'file_name' => 'required|max:255',
                'thumbnail' => 'required|mimes:jpeg,jpg,png',
                'catagory_id' => 'required',
                'file_type' => 'required',
            ]);

        $type=Auth::user()->user_type;

        if($request->file_type=="book"){
            $this->validate($request,[
                'file' => 'required|mimes:pdf',
            ]);
            
            $data=Books::create($request->all());

            $file=$request->file;
            $thumbnail=$request->thumbnail;

            
            $fname=$data->id."_".$request->file_name.".".$file->extension();
            $thumbname=$data->id.".".$thumbnail->extension();

            if ($type == 'admin') {
                Books::where('id',$data->id)->update([
                    "file" => $fname,
                    "thumbnail" => $thumbname,
                    "viewer_id" => "0",
                    "request" => "0"
                ]);
            }
            else{
                Books::where('id',$data->id)->update([
                    "file" => $fname,
                    "thumbnail" => $thumbname,
                    "viewer_id" => "0"
                ]);
            }
            

            $file->storeAs('public/files/books',$fname);
            $thumbnail->storeAs('public/thumbnail/books',$thumbname);
        }
        else if($request->file_type=="video"){
            $this->validate($request,[
                'file' => 'required|mimes:mp4',
            ]);

            $data=Videos::create($request->all());

            $file=$request->file;

            $thumbnail=$request->thumbnail;
            
            $fname=$data->id."_".$request->file_name.".".$file->extension();
            $thumbname=$data->id.".".$thumbnail->extension();

            if ($type == 'admin') {
                Videos::where('id',$data->id)->update([
                    "file" => $fname,
                    "thumbnail" => $thumbname,
                    "viewer_id" => "0",
                    "request" => "0"
                ]);
            }
            else{
                Videos::where('id',$data->id)->update([
                    "file" => $fname,
                    "thumbnail" => $thumbname,
                    "viewer_id" => "0"
                ]);
            }
            

            $file->storeAs('public/files/videos',$fname);
            $thumbnail->storeAs('public/thumbnail/videos',$thumbname);

        }
        else if($request->file_type=="ppt"){
            $this->validate($request,[
                'file' => 'required|mimes:ppt,pptx',
            ]);

            $data=PPTs::create($request->all());

            $file=$request->file;

            $thumbnail=$request->thumbnail;
            
            $fname=$data->id."_".$request->file_name.".".$file->extension();
            $thumbname=$data->id.".".$thumbnail->extension();

            if ($type == 'admin') {
                PPTs::where('id',$data->id)->update([
                    "file" => $fname,
                    "thumbnail" => $thumbname,
                    "viewer_id" => "0",
                    "request" => "0"
                ]);
            }
            else{
                PPTs::where('id',$data->id)->update([
                    "file" => $fname,
                    "thumbnail" => $thumbname,
                    "viewer_id" => "0"
                ]);
            }

            $file->storeAs('public/files/ppts',$fname);
            $thumbnail->storeAs('public/thumbnail/ppts',$thumbname);

        }

        if ($type == 'admin') {
            return redirect()->back()->withErrors('File Uploaded Successfully');
        }
        else{
            return redirect()->back()->withErrors('File Uploaded Successfully. Please wait for admin confirmation');
        }
    }

    public function showFileSearchForm(){
        return view("File.searchFileView");
    }

    public function searchFile(Request $request){
        $file_type=$request->file_type;
        $file_name='%'.$request->file_name.'%';
        $catagories=Catagory::get();

        if($file_type=="book"){
            $books=Books::where("file_name",'like',$file_name)->where('request',0)->paginate(12);
            $title=$request->file_name;

            for ($i=0;$i<count($books);$i++) {
                $author=User::where('email',$books[$i]->uploader_email)->first();
                $books[$i]->author=$author->first_name." ".$author->last_name;
            }

            return view("book.bookList")->with(compact("title","books","catagories"));
        }
        else if($file_type=="video"){
            $videos=Videos::where("file_name",'like',$file_name)->where('request',0)->paginate(12);
            $title=$request->file_name;

            for ($i=0;$i<count($videos);$i++) {
                $author=User::where('email',$videos[$i]->uploader_email)->first();
                $videos[$i]->author=$author->first_name." ".$author->last_name;
            }

            return view("video.videoList")->with(compact("title","videos","catagories"));
        }
        else if($file_type=="ppt"){
            $ppts=PPTs::where("file_name",'like',$file_name)->where('request',0)->paginate(12);
            $title=$request->file_name;

            for ($i=0;$i<count($ppts);$i++) {
                $author=User::where('email',$ppts[$i]->uploader_email)->first();
                $ppts[$i]->author=$author->first_name." ".$author->last_name;
            }

            return view("ppt.pptList")->with(compact("title","ppts","catagories"));
        }

        else if($file_type=="training"){
            $trainings=Training::where("title",'like',$file_name)->where('request',0)->paginate(12);
            $title=$request->file_name;

            for ($i=0;$i<count($trainings);$i++) {
                $author=User::where('email',$trainings[$i]->uploader_email)->first();
                $trainings[$i]->author=$author->first_name." ".$author->last_name;
            }

            return view("training.trainingList")->with(compact("title","trainings","catagories"));
        }

        else if($file_type=="course"){
            $courses=Course::where("title",'like',$file_name)->where('request',0)->paginate(12);
            $title=$request->file_name;

            for ($i=0;$i<count($courses);$i++) {
                $author=User::where('email',$courses[$i]->author_email)->first();
                $courses[$i]->author=$author->first_name." ".$author->last_name;
            }

            return view("course.courseList")->with(compact("title","courses","catagories"));
        }

        else if($file_type=="all-files"){
            $total_books=Books::where("file_name",'like',$file_name)->where('request',0)->count();
            $total_ppts=PPTs::where("file_name",'like',$file_name)->where('request',0)->count();
            $total_videos=Videos::where("file_name",'like',$file_name)->where('request',0)->count();
            $total_trainings=Training::where("title",'like',$file_name)->where('request',0)->count();
            $total_courses=Course::where("title",'like',$file_name)->where('request',0)->count();
            $title=$request->file_name;

            return view("File.fileSearchResult")->with(compact("title","total_books","total_ppts","total_videos","total_trainings","total_courses"));
        }
    }

    public function getoSection(Request $request){
        $this->validate($request,[
            'section' => 'required',
            'catagory_id' => 'required'
        ]);

        if($request->catagory_id=='0'){
            $url=$request->section;
        }
        else{
            $url=$request->section.'/catagory/'.$request->catagory_id;
        }

        return redirect($url);
    }
}
