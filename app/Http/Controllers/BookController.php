<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\Catagory;
use Illuminate\Support\Facades\Storage;
use Auth;



class BookController extends Controller
{
    public function index(){
    	$books=Books::orderBy("id","desc")->paginate(12);
    	$title="Books";

         for ($i=0;$i<count($books);$i++) {
                $author=User::where('email',$books[$i]->uploader_email)->first();
                $books[$i]->author=$author->first_name." ".$author->last_name;
            }

    	return view("book.bookList")->with(compact("title","books"));
    }

    public function viewBook($id){
    	$book=Books::where("id",$id)->first();
    	
        if($book!=null){
            $total_view=$book->total_view+1;
            $viewer_id=$book->viewer_id;

            $viewer_id=$this->checkUserinViewerList($viewer_id);

            Books::where("id",$id)->update([
                "total_view"=>$total_view,
                "viewer_id"=>$viewer_id
            ]);

            $related_books= Books::where("catagory_id",$book->catagory_id)->orderBy("id","desc")->limit(6)->get();

            for($i=0;$i<count($related_books);$i++) {
                $author=User::where('email',$related_books[$i]->uploader_email)->first();
                $related_books[$i]->author=$author->first_name." ".$author->last_name;
            }

            $catagory=Catagory::where("id",$book->catagory_id)->first();
            $book->catagory_name=$catagory->catagory_name;

            $title=$book->file_name;
            $author=User::where("email",$book->uploader_email)->first();
            return view("book.viewBook")->with(compact("title","book","author","related_books"));
        }
        else{
            return redirect("/books");
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

    public function catagoryBook($id){
    	$books=Books::where("catagory_id",$id)->orderBy("id","desc")->paginate(12);;
    	$catagory=Catagory::where("id",$id)->first();

        if($catagory!=null){
            $title=$catagory->catagory_name;
        }
        else{
            $title="Not found";
        }

        for ($i=0;$i<count($books);$i++) {
                $author=User::where('email',$books[$i]->uploader_email)->first();
                $books[$i]->author=$author->first_name." ".$author->last_name;
            }

    	return view("book.bookList")->with(compact("title","books"));
    }

    public function authorBook($email){
    	$books=Books::where("uploader_email",$email)->orderBy("id","desc")->paginate(12);
    	$author=User::where("email",$email)->first();

    	if($author!=null){
            $title=$author->first_name." ".$author->last_name;
        }
        else{
            $title="Not found";
        }

    	return view("book.bookList")->with(compact("title","books"));
    }

    public function downloadBook($id){
    	$book=Books::where("id",$id)->first();
    	$path=storage_path("app/public/files/books/".$book->file);
      	return response()->download($path);
    }
}
