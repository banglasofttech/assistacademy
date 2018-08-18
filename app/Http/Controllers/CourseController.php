<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\Catagory;
use App\Course;
use App\Review;
use App\Comment;
use Illuminate\Support\Facades\Storage;
use Auth;


class CourseController extends Controller
{
    public function index(){
        $courses=Course::orderBy("id","desc")->where('request',0)->where('request',0)->paginate(20);
        $title="Courses";

        foreach ($courses as $course) {
                $author=User::where('email',$course->author_email)->first();
                $course->author=$author->first_name." ".$author->last_name;
            }

        $catagories=Catagory::get();
        return view("course.courseList")->with(compact("title","courses","catagories"));
    }

    public function catagorywiseCourse($id){
        $courses=Course::where("catagory_id",$id)->where('request',0)->where('request',0)->orderBy("id","desc")->paginate(20);;
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
        $courses=Course::where("author_email",$email)->where('request',0)->orderBy("id","desc")->paginate(20);
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

            $user_id = Auth::user()->id;

            //check current user already rated or not
            $rated = Review::where('content_id',$id)->where('user_id',$user_id)->where('type','course')->first();

            $total_rating = Review::where('content_id',$id)->sum("rating");
            $total_person = Review::where('content_id',$id)->count();
            
            if($total_person > 0){
                $avg_rating = $total_rating/$total_person;
            }
            else{
                $avg_rating = 0;
            }

            //count individual rating
            $star1 = Review::where('content_id',$id)->where('type','course')->where("rating",1)->count();
            $star2 = Review::where('content_id',$id)->where('type','course')->where("rating",2)->count();
            $star3 = Review::where('content_id',$id)->where('type','course')->where("rating",3)->count();
            $star4 = Review::where('content_id',$id)->where('type','course')->where("rating",4)->count();
            $star5 = Review::where('content_id',$id)->where('type','course')->where("rating",5)->count();

            //get all review
            $all_review = Review::where('content_id',$id)->where('type','course')->orderBy("id","desc")->limit(10)->get();
            $reviewed_users = null;
            $i=0;

            //get reviewed user information
            foreach ($all_review as $single_review) {
                $reviewed_users[$i] = User::where("id",$single_review->user_id)->first();
                $i++;
            }

            //total comment
            $total_comment = Comment::where('content_id',$id)->where('type','course')->count();
             //get all review
            $all_comment = Comment::where('content_id',$id)->where('type','course')->orderBy("id","desc")->limit(10)->get();
            $commented_users = null;
            $i=0;

             //get commented user information
            foreach ($all_comment as $single_comment) {
                $commented_users[$i] = User::where("id",$single_comment->user_id)->first();
                $i++;
            }

            return view("course.viewCourse")->with(compact("course","book_links","book_files","ppt_links","ppt_files","video_links","video_files","instructions","exam_files","duration","outcomes","author","category","related_courses","file_ext","rated","avg_rating","star2","star3","star4","star1","star5","all_review","reviewed_users","total_comment", "commented_users", "all_comment"));

        }
        else{
            return redirect("/courses");
        }
    }

    public function previewCourse($id){
        $course=Course::where("id",$id)->first();

        if($course!=null){
            $outcomes=explode(',', $course->outcome);
            $author=User::where('email',$course->author_email)->first();
            $file_ext=pathinfo( $course->introduction_file, PATHINFO_EXTENSION);

            $total_rating = Review::where('content_id',$id)->sum("rating");
            $total_person = Review::where('content_id',$id)->count();
            
            if($total_person > 0){
                $avg_rating = $total_rating/$total_person;
            }
            else{
                $avg_rating = 0;
            }

            return view("course.previewCourse")->with(compact("course","outcomes","author","file_ext","avg_rating"));

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

        $type=Auth::user()->user_type;

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

        if ($type == 'admin') {
                Course::where('id',$data->id)->update([
                    "introduction_file" => $introduction_file,
                    "book_file" => $book_file,
                    "ppt_file" => $ppt_file,
                    "video_file" => $video_file,
                    "exam_file" => $exam_file,
                    "instruction" => $instruction,
                    "thumbnail" => $thumbnail,
                    "viewer_id" => "0",
                    "request" => "0"
                ]);
            }
            else{
                Course::where('id',$data->id)->update([
                    "introduction_file" => $introduction_file,
                    "book_file" => $book_file,
                    "ppt_file" => $ppt_file,
                    "video_file" => $video_file,
                    "exam_file" => $exam_file,
                    "instruction" => $instruction,
                    "thumbnail" => $thumbnail,
                    "viewer_id" => "0"
                ]);
            }

        if ($type == 'admin') {
           return redirect()->back()->withErrors("Course added successfully");
        }
        else{
            return redirect()->back()->withErrors("Course added successfully. Please wait for admin confirmation");
        }
    	
    	
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

    public function viewComment($id){
        $title = Course::where('id',$id)->first()->title;

        if($title != null){

            //total comment
            $total_comment = Comment::where('content_id',$id)->where('type','course')->count();

             //get all review
            $all_comment = Comment::where('content_id',$id)->where('type','course')->orderBy("id","desc")->paginate(50);

            $commented_users = null;
            $i=0;

             //get commented user information
            foreach ($all_comment as $single_comment) {
                $commented_users[$i] = User::where("id",$single_comment->user_id)->first();
                $i++;
            }

            return view('comments')->with(compact("title", "total_comment", "commented_users", "all_comment"));

        }
        return required()->back()->withErrors("Invalid course id");
    }

    public function viewReview($id){
        $title = Course::where('id',$id)->first()->title;

        if($title != null){

            //total comment
            $total_review = Review::where('content_id',$id)->where('type','course')->count();

             //get all review
            $all_review = Review::where('content_id',$id)->where('type','course')->orderBy("id","desc")->paginate(50);

            $reviewed_users = null;
            $i=0;

             //get commented user information
            foreach ($all_review as $single_review) {
                $reviewed_users[$i] = User::where("id",$single_review->user_id)->first();
                $i++;
            }

            return view('reviewes')->with(compact("title", "total_review", "reviewed_users", "all_review"));

        }
        return required()->back()->withErrors("Invalid course id");
    }


    public function show_course_editor_form($id){
        $categories  = Catagory::where('root_id',0)->get();
        $course = Course::where('id',$id)->first();

        if($course != null && (Auth::user()->email == $course->author_email || Auth::user()->user_type == 'admin')){

            $ppt_files=explode('|', $course->ppt_file);
            $video_files=explode('|', $course->video_file);
            $book_files=explode('|', $course->book_file);
            $exam_files=explode('|', $course->exam_file);
            $instruction=explode('|', $course->instruction);
            $duration = count($instruction)-1;

            return view('course.editCourse')->with(compact("categories", "course","video_files","ppt_files","book_files","exam_files","instruction","duration"));
        }
        else{
            return redirect()->back();
        }

    }

    public function editCourse(Request $request){
        $id = $request->id;
        $course  = Course::where('id',$id)->first();

        if(Auth::user()->email == $course->author_email || Auth::user()->user_type == 'admin'){
            $this->validate($request, [
                'title' => 'required',
                'duration' => 'required|integer',
                'course_fee' => 'required|integer',
                'trainer_description' => 'required',
                'description' => 'required',
                'outcome' => 'required',
                'introduction_text' => 'required',
                'introduction_file' => 'mimes:ppt,mp4,pdf',
                'thumbnail' => 'mimes:jpg,png,jpeg',
                'study_instruction' => 'required',
            ]);

            //concate study instruction and save to requset object
            $study_instructions=$request->study_instruction;
            $instruction="";
            if(!empty($study_instructions)){
                foreach ($study_instructions as $study_instruction) {
                    $instruction.=$study_instruction."|";
                }
            }

            Course::where('id',$id)->update([
                'title' => $request->title,
                'duration' => $request->duration,
                'course_fee' => $request->course_fee,
                'introduction_text' => $request->introduction_text,
                'description' => $request->description,
                'trainer_description' => $request->trainer_description,
                'instruction' => $instruction
            ]);

            $name = $id."_".$request->title;

            //if user update category id
            if($request->catagory_id != null){
                Course::where('id',$id)->update([
                    'catagory_id' => $request->catagory_id
                ]);
            }

            //if user update duration type
            if($request->duration_type != null){
                Course::where('id',$id)->update([
                    'duration_type' => $request->duration_type
                ]);
            }

            //if user upload new introduction file
            if($request->hasFile('introduction_file')){
                //delete old introduction file
                Storage::delete('/public/files/course/introduction_files/'.$course->introduction_file);

                //Save new introduction file
                $introduction_file=$request->introduction_file;
                $introduction_file_name=$name."_introduction_file".".".$introduction_file->extension();
                $introduction_file->storeAs('public/files/course/introduction_files',$introduction_file_name);

                //update database
                Course::where('id',$id)->update([
                    'introduction_file' => $introduction_file_name
                ]);
            }

            //if user delete any old video
            $current_video_file = $course->video_file;
            if($request->removed_video != null){
                //make name to array
                $removed_videos = explode('|', $request->removed_video);
                //removed removed video from storage folder.
                for($i=1; $i<count($removed_videos); $i++){
                    $video = '/public/files/course/videos/'.$removed_videos[$i-1];
                    Storage::delete($video);
                }

                //current video file name
                $current_video_file = str_replace($request->removed_video,"",$current_video_file);
            }

            //if user delete any old ppt
            $current_ppt_file = $course->ppt_file;
            if($request->removed_ppt != null){
                //make name to array
                $removed_ppts = explode('|', $request->removed_ppt);
                //remove removed video from storage folder.
                for($i=1; $i<count($removed_ppts); $i++){
                    $ppt = '/public/files/course/ppts/'.$removed_ppts[$i-1];
                    Storage::delete($ppt);
                }

                //current video file name
                $current_ppt_file = str_replace($request->removed_ppt,"", $current_ppt_file);
            }

            //if user delete any old book
            $current_book_file = $course->book_file;
            if($request->removed_book != null){
                //make name to array
                $removed_books = explode('|', $request->removed_book);
                //removed removed video from storage folder.
                for($i=1; $i<count($removed_books); $i++){
                    $book = '/public/files/course/books/'.$removed_books[$i-1];
                    Storage::delete($book);
                }

                //current video file name
                $current_book_file = str_replace($request->removed_book,"",$current_book_file);
            }

            //if user delete any old exam file
            $current_exam_file = $course->exam_file;
            if($request->removed_ef != null){
                //make name to array
                $removed_efs = explode('|', $request->removed_ef);
                //remove removed video from storage folder.
                for($i=1; $i<count($removed_efs); $i++){
                    $ef = '/public/files/course/examfiles/'.$removed_efs[$i-1];
                    Storage::delete($ef);
                }

                //current video file name
                $current_exam_file = str_replace($request->removed_ef,"", $current_exam_file);
            }

            //get uploaded files
            $ppts=$request->ppt_files;
            $videos=$request->video_files;
            $books=$request->book_files;
            $exam_files=$request->exam_files;


            //validate uploaded file arrray with the following function
            $this->validatePPTs($ppts);
            $this->validateVideos($videos);
            $this->validateBooks($books);
            $this->validateExamFiles($exam_files);

            //add books to storage and concate names in video_file
            if(!empty($books)){
                $new_book_files="";
                foreach ($books as $book) {
                    $file_name=$book->getClientOriginalName();
                    $new_book_files.=$file_name."|";
                    $book->storeAs('public/files/course/books',$file_name);
                }

                if($request->book_postion == 'before'){
                    $current_book_file = $new_book_files.$current_book_file;
                }
                else{
                    $current_book_file = $current_book_file.$new_book_files;
                }
            }

            //add video to storage and concate names in video_file
            if(!empty($videos)){
                $new_video_files="";
                foreach ($videos as $video) {
                    $file_name=$video->getClientOriginalName();
                    $new_video_files.=$file_name."|";
                    $video->storeAs('public/files/course/videos',$file_name);
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
                    $ppt->storeAs('public/files/course/ppts',$file_name);
                }

                if($request->ppt_postion == 'before'){
                    $current_ppt_file = $new_ppt_files.$current_ppt_file;
                }
                else{
                    $current_ppt_file = $current_ppt_file.$new_ppt_files;
                }
            }

            //add exam files to storage and concate names in exam_files
            if(!empty($exam_files)){
                $new_exam_files="";
                foreach ($exam_files as $exam_file) {
                    $file_name=$exam_file->getClientOriginalName();
                    $new_exam_files.=$file_name."|";
                    $exam_file->storeAs('public/files/course/examfiles',$file_name);
                }

                if($request->ef_postion == 'before'){
                    $current_exam_file = $new_exam_files.$current_exam_file;
                }
                else{
                    $current_exam_file = $current_exam_file.$new_exam_files;
                }
            }

            if($current_book_file != null){
                //update database
                Course::where('id',$id)->update([
                    'book_file' => $current_book_file
                ]);
            }

            if($current_video_file != null){
                //update database
                Course::where('id',$id)->update([
                    'video_file' => $current_video_file
                ]);
            }

            if($current_ppt_file != null){
                //update database
                Course::where('id',$id)->update([
                    'ppt_file' => $current_ppt_file
                ]);
            }

            if($current_exam_file != null){
                //update database
                Course::where('id',$id)->update([
                    'exam_file' => $current_exam_file
                ]);
            }

            //if user upload new banner, save it to the existing file
            if($request->thumbnail != null){
                $request->thumbnail->storeAs('public/thumbnail/course',$course->thumbnail);
            }

            return redirect()->back()->withErrors('Course updated successfully');
        }
        else{
            return redirect()->back();
        }
    }   


}
