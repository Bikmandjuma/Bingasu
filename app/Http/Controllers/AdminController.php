<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSocialMedia;
use App\Models\Agent;
use App\Models\AboutUs;
use App\Models\PropertyType;
use App\Models\Contact;
use Crypt;

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

    public function AboutUs(){
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

    public function PropertyTypes(){
        return view('Users.Admin.PropertyType');
    }

    public function ViewService(){
        return view('Users.Admin.Service');
    }

    public function ViewMailBox(){
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

}
