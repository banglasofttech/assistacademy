<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Videos;
use App\PPTs;
use App\User;
use Auth;
use App\Catagory;
use DB;


class AuthorController extends Controller
{
    public function viewProfile($id){
    	$author=User::where("id",$id)->first();

    	if($author!=null){
    		$title=$author->first_name." ".$author->last_name;
    		$books=Books::where('uploader_email',$author->email)->count();
    		$videos=Videos::where('uploader_email',$author->email)->count();
    		$ppts=PPTs::where('uploader_email',$author->email)->count();

    		return view("user.authorProfile")->with(compact("title","books","videos","ppts","author"));
    	}
    	return redirect("/");
    }

    public function sendAuthorRequest(){
        User::where('email',Auth::user()->email)->update([
            'author_request' => '1'
        ]);

        return redirect("/")->with('message',"Please wait for admin verification");
    }

    public function authorList(){
        $authors=User::where('user_type','author')->paginate(20);
        $title="Authors";

        return view('user.searchAuthor')->with(compact("authors","title"));
    }

    public function searchAuthor(Request $request){
        $author_name='%'.$request->author_name.'%';

        $authors=User::where('user_type','author')
        ->where(function($q) use ($author_name){
            $q->where('first_name','like',$author_name)
                ->orWhere('last_name','like',$author_name)
                ->orWhere(DB::raw("concat('first_name', ' ', 'last_name')"), 'like',$author_name);
        })->paginate(20);

        $title=$request->author_name;
        
        return view('user.searchAuthor')->with(compact("authors","title"));
    }
}
