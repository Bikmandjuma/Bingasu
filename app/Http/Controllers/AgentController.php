<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Crypt;

class AgentController extends Controller
{
    public function AgentCreateAccount(){
    	return view('AgentAccount.AddProperty');
    }

    public function AgentHome($id){
    	return view('Users.Agent.Home');
    }

     public function CreateAgent(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'gender' => 'required',
            'country' => 'required',
            'phone' => 'required|numeric|min:10|unique:agents,phone',
            'email' => 'required|string|email|max:255|unique:agents,email',
            'password' => 'required|string|confirmed|between:8,255',
            'password_confirmation' => 'required',
        ]);

    	$image='user.png';
        $agent=Agent::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'nationality' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'image'  =>$image,            
            'password' => Hash::make($request->password),
        ]);

        if(auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            $rand=rand(10000,100000);
            $id=Crypt::encryptString((auth()->guard('agent')->user()->id.$rand));
            return redirect(route('AgentDashboard',$id));
        }
    }

}
