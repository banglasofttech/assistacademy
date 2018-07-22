<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Videos;
use App\PPTs;
use App\User;
use Auth;
use App\Catagory;
use App\Course;
use App\Authors;
use App\Corporates;
use App\Training;
use DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showLoginForm(){
        if(!Auth::user()){
            return view('user.adminlogin');            
        }
        else if(Auth::user()->user_type=="admin" || Auth::user()->user_type=="author"){
            return redirect('mypanel');
        }
        else {
            return redirect('/');
        }
    }
    public function showAuthorRequsetTable(){
    	$users=User::where('request',"author")->paginate(50);
    	return view('user.authorRequestView')->with(compact("users"));
    }

    public function acceptAuthorRequest($id){
        $user=User::where('id',$id)->first();

        // for other information
        // $others=array(explode('|', $user->others));

        Authors::create([
            'name'=>$user->first_name." ".$user->last_name,
            'email'=>$user->email,
            'address'=>$user->address,
            'country'=>$user->country,
            'phone'=>$user->phone,
            'organization'=>$user->organization,
            'occupation'=>$user->occupation,
            'pp'=>$user->pp,
        ]);

    	User::where('id',$id)->update([
    		'user_type' => 'author',
    		'request' => '0'
    	]);
        return redirect()->back();
    }

    public function rejectAuthorRequest($id){
        User::where('id',$id)->update([
            'user_type' => 'general_user',
            'request' => '0'
        ]);
        return redirect()->back();
    }

    public function showAuthorListTable(){
    	$users=User::where('user_type',"author")->paginate(50);
    	return view('user.authorList')->with(compact("users"));
    }

    public function removeAuthor($id){
        User::where('id',$id)->update([
            'user_type' => 'general_user',
            'request' => '0'
        ]);

        $email=User::where('id',$id)->first()->email;

        Authors::where('email',$email)->delete();

        return redirect()->back();
    }

    public function showLearnerListTable(){
    	$users=User::where('user_type',"learner")->paginate(50);
    	return view('user.learnerList')->with(compact("users"));
    }

    public function showCorporateRequsetTable(){
        $users=User::where('request',"corporate")->paginate(50);
        return view('user.corporaterequest')->with(compact("users"));
    }

    public function acceptCorporate($id){
        $user=User::where('id',$id)->first();

        Corporates::create([
            'name'=>$user->first_name." ".$user->last_name,
            'email'=>$user->email,
            'address'=>$user->address,
            'country'=>$user->country,
            'phone'=>$user->phone,
            'organization'=>$user->organization,
        ]);

        User::where('id',$id)->update([
            'user_type' => 'corporate',
            'request' => '0'
        ]);
        return redirect()->back();
    }

    public function rejectCorporate($id){
        User::where('id',$id)->update([
            'user_type' => 'general_user',
            'request' => '0'
        ]);
        return redirect()->back();
    }

    public function showCorporateUserListTable(){
        $users=User::where('user_type',"corporate")->paginate(50);
        return view('user.corporateuserList')->with(compact("users"));
    }


    public function showLearnerRequsetTable(){
        $users=User::where('request',"learner")->paginate(50);
        return view('user.learnerRequest')->with(compact("users"));
    }

    public function acceptLearner($id){
        $user=User::where('id',$id)->first();

        User::where('id',$id)->update([
            'user_type' => 'learner',
            'request' => '0'
        ]);
        return redirect()->back();
    }

    public function rejectLearner($id){
        User::where('id',$id)->update([
            'user_type' => 'general_user',
            'request' => '0'
        ]);
        return redirect()->back();
    }
    
    public function manageFilesView(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;
        if($user_type=="admin"){
            $last_book=Books::orderBy('created_at','desc')->first();
            $last_video=Videos::orderBy('created_at','desc')->first();
            $last_ppt=PPTs::orderBy('created_at','desc')->first();

            $total_book=Books::count();
            $total_video=Videos::count();
            $total_ppt=PPTs::count();
        }
        elseif ($user_type=="author") {
            $last_book=Books::where("uploader_email",$user_email)->orderBy('created_at','desc')->first();
            $last_video=Videos::where("uploader_email",$user_email)->orderBy('created_at','desc')->first();
            $last_ppt=PPTs::where("uploader_email",$user_email)->orderBy('created_at','desc')->first();

            $total_book=Books::where("uploader_email",$user_email)->count();
            $total_video=Videos::where("uploader_email",$user_email)->count();
            $total_ppt=PPTs::where("uploader_email",$user_email)->count();
        }
        else{
            return redirect("/");
        }

        return view('File.manageFilesView')->with(compact("last_book","last_video","last_ppt","total_book","total_video","total_ppt"));

    }

    public function manageBooksView(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;

        if($user_type=="admin"){
            $books=Books::paginate(50);
        }
        elseif ($user_type=="author") {
            $books=Books::where("uploader_email",$user_email)->paginate(50);
        }
        else{
            return redirect("/");
        }

        foreach ($books as $book) {
            $catagory=Catagory::where("id",$book->catagory_id)->first();
            $book->catagory_id=$catagory->catagory_name;

            $user=User::where("email",$book->uploader_email)->first();
            $book->uploader_email=$user->first_name." ".$user->last_name;
            $book->user_id=$user->id;

            $book->users=$this->countViewerID($book->viewer_id);
        }

        return view('book.manageBookView')->with(compact("books"));
    }

    public function removeBook($id){
        $file=Books::where('id',$id)->first();
        Storage::delete('public/files/books/'.$file->file);
        Storage::delete('public/thumbnail/books/'.$file->thumbnail);

        Books::destroy($id);
        return redirect("/managefiles/books");
    }

    public function manageVideosView(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;

        if($user_type=="admin"){
            $videos=Videos::paginate(50);
        }
        elseif ($user_type=="author") {
            $videos=Videos::where("uploader_email",$user_email)->paginate(50);
        }
        else{
            return redirect("/");
        }
        

        foreach ($videos as $video) {
            $catagory=Catagory::where("id",$video->catagory_id)->first();
            $video->catagory_id=$catagory->catagory_name;

            $user=User::where("email",$video->uploader_email)->first();
            $video->uploader_email=$user->first_name." ".$user->last_name;
            $video->user_id=$user->id;

            $video->users=$this->countViewerID($video->viewer_id);
        }

        return view('video.manageVideoView')->with(compact("videos"));
    }

    public function removeVideo($id){
        $file=Videos::where('id',$id)->first();
        Storage::delete('public/files/videos/'.$file->file);
        Storage::delete('public/thumbnail/videos/'.$file->thumbnail);

        Videos::destroy($id);
        return redirect("/managefiles/videos");
    }

    public function managePPTsView(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;
        
        //get ppt's for admin and author. Admin will get all ppt but author only uploaded ppt's
        if($user_type=="admin"){
            $ppts=PPTs::paginate(50);
        }
        elseif ($user_type=="author") {
            $ppts=PPTs::where("uploader_email",$user_email)->paginate(50);
        }
        else{
            return redirect("/");
        }

        //get catagory name from catagory id
        foreach ($ppts as $ppt) {
            $catagory=Catagory::where("id",$ppt->catagory_id)->first();
            $ppt->catagory_id=$catagory->catagory_name;

            $user=User::where("email",$ppt->uploader_email)->first();
            $ppt->uploader_email=$user->first_name." ".$user->last_name;
            $ppt->user_id=$user->id;

            $ppt->users=$this->countViewerID($ppt->viewer_id);
        }

        return view('ppt.managePPTView')->with(compact("ppts"));
    }

    public function removePPT($id){
        $file=PPTs::where('id',$id)->first();
        Storage::delete('public/files/ppts/'.$file->file);
        Storage::delete('public/thumbnail/ppts/'.$file->thumbnail);

        PPTs::destroy($id);
        return redirect("/managefiles/ppts");
    }

    public function manageTrainingView(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;
        
        //get ppt's for admin and author. Admin will get all ppt but author only uploaded ppt's
        if($user_type=="admin"){
            $trainings=Training::paginate(50);
        }
        elseif ($user_type=="author") {
            $trainings=Training::where("uploader_email",$user_email)->paginate(50);
        }
        else{
            return redirect("/");
        }

        //get catagory name from catagory id
        foreach ($trainings as $training) {
            $catagory=Catagory::where("id",$training->catagory_id)->first();
            $training->catagory_id=$catagory->catagory_name;

            $user=User::where("email",$training->uploader_email)->first();
            $training->uploader_email=$user->first_name." ".$user->last_name;
            $training->user_id=$user->id;

            $training->users=$this->countViewerID($training->viewer_id);
        }

        return view('training.manageTraining')->with(compact("trainings"));
    }

    public function removeTraining($id){
        $file=Training::where('id',$id)->first();
        Storage::delete('public/files/ppts/'.$file->file);
        Storage::delete('public/thumbnail/ppts/'.$file->thumbnail);

        Training::destroy($id);
        return redirect()->back();
    }

    public function viewDashborad(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;

        $author_requests=User::where('request','author')->get()->count();
        $corporate_requests=User::where('request','corporate')->get()->count();
        $learner_requests=User::where('request','learner')->get()->count();

        $total_trainer=User::where('user_type','author')->get()->count();
        $total_learner=User::where('user_type','learner')->get()->count();
        $total_corporate_user=User::where('user_type','corporate')->get()->count();

        if($user_type=='admin'){
            $total_books=Books::get()->count();
            $total_ppts=PPTs::get()->count();
            $total_videos=Videos::get()->count();
            $total_training=Training::get()->count();
            $total_courses=Course::get()->count();
        }
        else if($user_type=='author'){
            $total_books=Books::where('uploader_email',$user_email)->get()->count();
            $total_ppts=PPTs::where('uploader_email',$user_email)->get()->count();
            $total_videos=Videos::where('uploader_email',$user_email)->get()->count();
            $total_training=Training::where('uploader_email',$user_email)->get()->count();
            $total_courses=Course::where('author_email',$user_email)->get()->count();
        }
        else return redirect('/');

        return view('dashboard')->with(compact("total_books","total_ppts","total_videos","total_training","total_courses","author_requests","corporate_requests","learner_requests","total_trainer","total_learner","total_corporate_user"));
    }

    public function manageCourseView(){
        $user_type=Auth::user()->user_type;
        $user_email=Auth::user()->email;
        
        if($user_type=="admin"){
            $courses=Course::paginate(50);
        }
        elseif ($user_type=="author") {
            $courses=Course::where("author_email",$user_email)->paginate(50);
        }
        else{
            return redirect("/");
        }

        foreach ($courses as $course) {
            $course->users=$this->countViewerID($course->viewer_id);
        }

        return view('course.manageCourseView')->with(compact("courses"));
    }

    private function countViewerID($viewer_id){
        $viewer=array(explode(',', $viewer_id));
        return count($viewer[0])-1; 
    }

}
