<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request){
    	$this->validate($request,[
    		'comment' => 'required'
    	]);
    	Comment::create($request->all());

    	return redirect()->back()->withErrors(array('message'=>'Comment added successfully'));
    }
}
