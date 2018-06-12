<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
            'user_type' => 'required|string',
         ]);

        $user_type=$request->user_type;

        if(Auth::guard()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'user_type'=>$user_type,
        ])){
            if($user_type=='admin' || $user_type=='author'){
                return redirect('/mypanel');
            }
            else{
                return redirect('/'); 
            }
        }
        elseif(Auth::guard()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'request'=>$user_type,
        ])){
            return redirect('/')->withErrors('Please wait for your confirmation');
        }
        else{
            return redirect()->back()->withErrors('Sorry, Email and Password not matched.');
        }
    }


    // protected function redirectTo()
    // {
    //     if(Auth::user()->author_request=="1"){
    //         return '/books';
    //     }
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
