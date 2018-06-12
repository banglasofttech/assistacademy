<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Catagory;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
    	$catagories=Catagory::get();
        return view('home')->with(compact("catagories"));
    }
}
