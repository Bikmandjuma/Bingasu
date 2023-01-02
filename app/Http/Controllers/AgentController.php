<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\AgentDeleteAccount;
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

    public function Myinformation($id){
        $agent_id=auth()->guard('agent')->user()->id;
        $info=Agent::where('id',$agent_id)->get();    
        return view('Users.Agent.Information',compact('info'));
    } 

    public function AgentManagePassword($id){
        return view('Users.Agent.Password');
    }

    public function CreatePassword(Request $request){
           # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|max:100',
            'new_password_confirmation' => 'required',
        ],[
            'new_password_confirmation.required' => 'Confirm new password field is required',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('agent')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        Agent::whereId(auth()->guard('agent')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    public function ShowProfile($id){
        return view('Users.Agent.ProfilePicture');
    }

    public function CreateProfile(Request $request){
        $id=auth()->guard('agent')->user()->id;
        
        $request->validate([
            'profile_picture' => 'mimes:jpg,jpeg,png,pdf',
        ],[
            'profile_picture.mimes'=>'profile picture must be in format of jpg,jpeg,png or pdf',
        ]);


        $file= $request->file('profile_picture');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $extenstion = $file->getClientOriginalExtension();
        $file-> move(public_path('images/agents/'), $filename);
        
        $profile=Agent::where('id',$id)->update(['image' => $filename]);
        
        if ($profile) {
            return redirect()->back()->with('profile_changed','profile changed  successfully !');
        }else{
            return redirect()->back()->with('profile_error','profile picture must be in format of jpg,jpeg,png or pdf');
        }   
    }

    public function AgentDeleteAccount(){
        $id=auth()->guard('agent')->user()->id;
        $fname=auth()->guard('agent')->user()->firstname;
        $lname=auth()->guard('agent')->user()->lastname;
        $gender=auth()->guard('agent')->user()->gender;
        $nationality=auth()->guard('agent')->user()->nationality;
        $phone=auth()->guard('agent')->user()->phone;
        $email=auth()->guard('agent')->user()->email;
        $image=auth()->guard('agent')->user()->image;
        $password=auth()->guard('agent')->user()->password;

        $agent=AgentDeleteAccount::create([
            'firstname' => $fname,
            'lastname' => $lname,
            'gender' => $gender,
            'nationality' => $nationality,
            'phone' => $phone,
            'email' => $email,
            'image'  => $image,            
            'password' => $password,
        ]);


        $agent=Agent::find($id)->delete();
        return redirect(route('Login'))->with('AgentDeleteAccount',''.$fname.' '.$lname.' Your account delete parmenently');        
    }

}
