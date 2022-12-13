<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSocialMedia;
use App\Models\Agent;
use App\Models\AboutUs;
use App\Models\PropertyType;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Admin;
use Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function AdminHome($id){
        $id=auth()->guard('admin')->user()->id;

    	return view('Users.Admin.home');
    }

    public function Homepage($id){
    	$data=AdminSocialMedia::all();
    	return view('Users.Admin.homepage',compact('data'));
    }

    public function AgentList($id){
    	$agent=Agent::paginate(5);
    	return view('Users.Admin.AgentList',compact('agent'));
    }

    public function DeleteAgentData($id){
       	$agent=Agent::find($id)->delete();
    	return redirect()->back()->with('delete','Agent deleted succesfully !');
    }

    public function AboutUs($id){
        return view('Users.Admin.AboutUs');
    }

    public function CreateAboutUs(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg',
            'content'=> 'required',
            'address' => 'required|max:255',
            'longitude' => 'required|max:25',
            'latitude' => 'required|max:25',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
        ]);

        $form=new AboutUs();

        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $extenstion = $file->getClientOriginalExtension();
            $file-> move(public_path('images/AboutUs'), $filename);
            $form['image']= $filename;
        }
            
        $form->content = $request->content;
        $form->property_address = $request->address;
        $form->property_owner_phone = $request->phone;
        $form->property_owner_email = $request->email;
        $form->property_long = $request->longitude;
        $form->property_lat = $request->latitude;
        $form->save();

        return redirect()->back()->with('about_added','About us content added successfully !');

    }

    public function ViewAgentInfo($id){
        $dd=Crypt::decryptString($id);
        $AgentInfo=Agent::all()->where('id',$dd);
        return view('Users.Admin.ViewAgentInfo',compact('AgentInfo'));
    }

    public function PropertyType(Request $request){
         $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg',
            'name'=> 'required|unique:property_types,name',
        ],[
            'name.unique' => 'this name '.$request->name.' already registerd !',
        ]);

        $form=new PropertyType();

        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $extenstion = $file->getClientOriginalExtension();
            $file-> move(public_path('images/AboutUs'), $filename);
            $form['image']= $filename;
        }
            
        $form->name= $request->name;
        $form->save();

        return redirect()->back()->with('success','About us content added successfully !');

    }

    public function PropertyTypes($id){
        return view('Users.Admin.PropertyType');
    }

    public function ViewService($id){
        return view('Users.Admin.Service');
    }

    public function ViewMailBox($id){
        $mail=Contact::all()->where('deleted','!=','deleted');
        return view('Users.Admin.Mailbox',compact('mail'));
    }

    public function ReadMail($mail,$id){

        $geust_id=Crypt::decryptString($id);
        $geust_email=Crypt::decryptString($mail);

        $read="read";
        $data =Contact::find($geust_id);
        $data->unread = $read;
        $data->save();
        

        return view('Users.Admin.ReadMail',['ids' => $geust_id,'email' => $geust_email]);
    }

    public function DeleteMail($id){

        $trash="deleted";
        $data =Contact::find($id);
        $data->deleted = $trash;
        $data->save();

        return redirect(route('mailbox'));
    }

    public function TrashedMail(){
        $mail=Contact::all()->where('deleted','deleted');
        return view('Users.Admin.TrashedMail',compact('mail'));
    }

     public function CustomerList($id){
        $customer=Customer::paginate(3);
        return view('Users.Admin.CustomerList',compact('customer'));
    }

    public function Myinformation(){
        $info=Admin::all();
        return view('Users.Admin.MyInformation',compact('info'));
    }

    public function AdminEditinfo($id){
        $ids=Crypt::decryptString($id);
        $data=Admin::find($ids);
        return view('Users.Admin.EditInformation',compact('data'));
    }

    public function AdminUpdateInfo(Request $request,$id){
        //encription of admin id
        $rand=rand(100000,1000000);
        $ids=Crypt::encryptString(auth()->guard('admin')->user()->id.$rand);

        $data =Admin::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nationality = $request->nationality;
        $data->save();
        return redirect(route('admininfos',$ids))->with('status','data Updated Successfully');
    }


    public function AdminManagePassword(){
        return view('Users.Admin.Password');
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
        if(!Hash::check($request->old_password, auth()->guard('admin')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        Admin::whereId(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    public function ShowProfile($id){
        return view('Users.Admin.ProfilePicture');
    }

    public function CreateProfile(Request $request){
        $id=auth()->guard('admin')->user()->id;
        
        $request->validate([
            'profile_picture' => 'mimes:jpg,jpeg,png,pdf',
        ],[
            'profile_picture.mimes'=>'profile picture must be in format of jpg,jpeg,png or pdf',
        ]);


        $file= $request->file('profile_picture');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $extenstion = $file->getClientOriginalExtension();
        $file-> move(public_path('images/admin/'), $filename);
        
        $profile=Admin::where('id',$id)->update(['image' => $filename]);
        
        if ($profile) {
            return redirect()->back()->with('profile_changed','profile changed  successfully !');
        }else{
            return redirect()->back()->with('profile_error','profile picture must be in format of jpg,jpeg,png or pdf');
        }   
    }

    public function AgentCountry($country){
        $country_name=Crypt::decryptString($country);
        $agent=Agent::where('nationality',$country_name)->paginate(5);
        return view('Users.Admin.AgentCountry',['Agents' => $agent,'Country_Name' => $country_name]);
    }


}
