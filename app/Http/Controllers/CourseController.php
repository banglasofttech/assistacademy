<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\Catagory;
use App\Course;
use Illuminate\Support\Facades\Storage;
use Auth;


class CourseController extends Controller
{
    public function index(){
        $courses=Course::orderBy("id","desc")->paginate(20);
        $title="Courses";

        foreach ($courses as $course) {
                $author=User::where('email',$course->author_email)->first();
                $course->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
        return view("course.courseList")->with(compact("title","courses","catagories"));
    }

    public function catagorywiseCourse($id){
        $courses=Course::where("catagory_id",$id)->orderBy("id","desc")->paginate(20);;
        $catagory=Catagory::where("id",$id)->first();

        if($catagory!=null){
            $title=$catagory->catagory_name;
        }
        else{
            return redirect('/');
        }

        foreach ($courses as $course) {
                $author=User::where('email',$course->author_email)->first();
                $course->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
        return view("course.courseList")->with(compact("title","courses","catagories"));
    }

     public function authorwiseCourse($email){
        $courses=Course::where("author_email",$email)->orderBy("id","desc")->paginate(20);
        $author=User::where("email",$email)->first();

        if($author!=null){
            $title=$author->first_name." ".$author->last_name;
        }
        else{
            return redirect('/');
        }

        for ($i=0;$i<count($courses);$i++) {
                $courses[$i]->author=$title;
            }

        $catagories=Catagory::get();
        return view("course.courseList")->with(compact("title","courses","catagories"));
    }

    public function addCourseView(){
        $catagories=Catagory::where("root_ID","0")->get();
        
        return view("course.addCourseView")->with("catagories",$catagories);
    }

    public function viewCourse($id){
        $course=Course::where("id",$id)->first();

        if($course!=null){
            $total_view=$course->total_view+1;
            $viewer_id=$course->viewer_id;

            $viewer_id=$this->checkUserinViewerList($viewer_id);

            Course::where("id",$id)->update([
                "total_view"=>$total_view,
                "viewer_id"=>$viewer_id
            ]);

            $related_courses= Course::where("catagory_id",$course->catagory_id)->orderBy("id","desc")->limit(5)->get();

            $book_links=explode(',', $course->book_link);
            $book_files=explode('|', $course->book_file);
            $ppt_links=explode(',', $course->ppt_link);
            $ppt_files=explode('|', $course->ppt_file);
            $video_links=explode(',', $course->video_link);
            $video_files=explode('|', $course->video_file);
            $instructions=explode('|', $course->instruction);
            $exam_files=explode('|', $course->exam_file);
            $outcomes=explode(',', $course->outcome);
            $duration=count($instructions)-1;
            $author=User::where('email',$course->author_email)->first();
            $category=Catagory::where('id',$course->catagory_id)->first();
            $file_ext=pathinfo( $course->introduction_file, PATHINFO_EXTENSION);

            return view("course.viewCourse")->with(compact("course","book_links","book_files","ppt_links","ppt_files","video_links","video_files","instructions","exam_files","duration","outcomes","author","category","related_courses","file_ext"));

        }
        else{
            return redirect("/courses");
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

    public function addNewCourse(Request $request){

    	$this->validate($request,[
                'title' => 'required|max:255',
                'trainer_description' => 'required',
                'duration' => 'required|integer',
                'course_fee' => 'required|integer',
                'description' => 'required',
                'outcome' => 'required',
                'introduction_text' => 'required',
                'study_introduction_file' => 'mimes:mp4,ppt,pdf',
                'course_thumbnail' => 'required|mimes:jpeg,jpg,png,gif',
            ]);

    	//get uploaded files
    	$books=$request->book_files;
    	$ppts=$request->ppt_files;
    	$videos=$request->video_files;
    	$exam_files=$request->exam_files;

    	//validate uploaded file arrray with the following function
    	$this->validateBooks($books);
    	$this->validatePPTs($ppts);
    	$this->validateVideos($videos);
    	$this->validateExamFiles($exam_files);

    	//inintilize variable to store uploaded file name
    	$book_file="";
    	$ppt_file="";
    	$video_file="";
    	$exam_file="";
    	$introduction_file="";

    	//concate study instruction and save to requset object
    	$study_instructions=$request->study_instruction;
    	$instruction="";
    	if(!empty($study_instructions)){
    		foreach ($study_instructions as $study_instruction) {
    			$instruction.=$study_instruction."|";
    		}
    	}
    	$request->instruction=$instruction;

    	$request->author_email=Auth::user()->email;

    	//add to database
    	$data=Course::create($request->all());

    	//make file name using id and title eg: id_title
    	$f_name=$data->id."_".$data->title;

        //Add thumbnail name
        $thumbnail=$f_name.'.'.$request->course_thumbnail->extension();

        //Save thumbnail
        $request->course_thumbnail->storeAs('public/thumbnail/course',$thumbnail);

    	//save introduction video to storage
    	if($request->hasFile('study_introduction_file')){
    	    $study_introduction_file=$request->study_introduction_file;
    		$introduction_file=$f_name."_introduction_file".".".$study_introduction_file->extension();
    		$study_introduction_file->storeAs('public/files/course/introduction_files',$introduction_file);
    	}
    	//add books to storage and concate names in book_file
    	if(!empty($books)){    	
    		$i=0;
    		foreach ($books as $book) {
    			$i++;
    			$file_name=$book->getClientOriginalName();
    			$book_file.=$file_name."|";
    			$book->storeAs('public/files/course/books',$file_name);
    		}
    	}

    	//add video to storage and concate names in video_file
    	if(!empty($videos)){
    		$i=0;
    		foreach ($videos as $video) {
    			$i++;
    			$file_name=$video->getClientOriginalName();
    			$video_file.=$file_name."|";
    			$video->storeAs('public/files/course/videos',$file_name);
    		}
    	}
    	
    	//add ppt to storage and concate names in ppt_file
    	if(!empty($ppts)){
    		$i=0;
    		foreach ($ppts as $ppt) {
    			$i++;
    			$file_name=$ppt->getClientOriginalName();
    			$ppt_file.=$file_name."|";
    			$ppt->storeAs('public/files/course/ppts',$file_name);
    		}
    	}

    	//add exam question to storage and concate names in exam_file
    	if(!empty($exam_files)){    	
    		$i=0;
    		foreach ($exam_files as $ef) {
    			$i++;
    			$file_name=$ef->getClientOriginalName();
    			$exam_file.=$file_name."|";
    			$ef->storeAs('public/files/course/examfiles',$file_name);
    		}
    	}

    	//update database
    	Course::where('id',$data->id)->update([
                "introduction_file" => $introduction_file,
                "book_file" => $book_file,
                "ppt_file" => $ppt_file,
                "video_file" => $video_file,
                "exam_file" => $exam_file,
                "instruction" => $instruction,
                "thumbnail" => $thumbnail,
                "viewer_id" => "0",
            ]);

    	return redirect()->back()->withErrors("Course added successfully");
    	
    }

    private function validateBooks($books){
    	if(!empty($books)){
    		foreach ($books as $book) {
    			if(!($book->extension()=="pdf")){
    				return redirect('/addcourse')->withErrors("Course Material Books must be in pdf format");
    			}
    		}
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

	private function validateExamFiles($exam_files){
		if(!empty($exam_files)){
    		foreach ($exam_files as $exam_file) {
    			if(!($exam_file->extension()=="pdf")){
    				return redirect('/addcourse')->withErrors("All Exam question must be in pdf format");
    			}
    		}
    	}
	}


}
