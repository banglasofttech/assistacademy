<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Catagory;
use App\Course;
use App\Books;
use App\Videos;
use App\PPTs;
use App\Training;
use App\User;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
    	$catagories=Catagory::get();
    	$courses=Course::orderBy('id','desc')->where('request',0)->limit(12)->get();
    	foreach ($courses as $course) {
    		$author=User::where('email',$course->author_email)->first();
    		$course->author=$author->first_name." ".$author->last_name;
    	}

        $trainings=Training::orderBy('id','desc')->where('request',0)->limit(12)->get();
        foreach ($trainings as $training) {
            $author=User::where('email',$training->uploader_email)->first();
            $training->author=$author->first_name." ".$author->last_name;
        }

        $books=Books::orderBy('id','desc')->where('request',0)->limit(12)->get();
        foreach ($books as $book) {
            $author=User::where('email',$book->uploader_email)->first();
            $book->author=$author->first_name." ".$author->last_name;
        }

        $videos=Videos::orderBy('id','desc')->where('request',0)->limit(12)->get();
        foreach ($videos as $video) {
            $author=User::where('email',$video->uploader_email)->first();
            $video->author=$author->first_name." ".$author->last_name;
        }

        $ppts=PPTs::orderBy('id','desc')->where('request',0)->limit(12)->get();
        foreach ($ppts as $ppt) {
            $author=User::where('email',$ppt->uploader_email)->first();
            $ppt->author=$author->first_name." ".$author->last_name;
        }


        return view('home')->with(compact("catagories","courses",'trainings','books','videos','ppts'));
    }
}
