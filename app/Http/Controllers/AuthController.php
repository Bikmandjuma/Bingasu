<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['email','password']]);
    }

     public function GetLogin()
    {
        return view('auth.login');
    }

    public function PostLogin(Request $request)
    {
        $this->validate($request,[
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            $rand=rand(10000,100000);
            $id=md5(auth()->guard('admin')->user()->id.$rand);
            return redirect(route('AdminHome',$id));

        }else{

            return redirect()->back()->with('fail','Wrong credentials ,try again !');

        }
        
    }


    public function Logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect(url('login'));
        
    }

}
