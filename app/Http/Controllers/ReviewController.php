<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function addReview(Request $request){
    	$this->validate($request,[
    		'rating' => 'required|integer'
    	]);
    	Review::create($request->all());

    	return redirect()->back()->withErrors(array('message'=>'Review added successfully'));
    }
}
