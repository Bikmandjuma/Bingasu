<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Crypt;

class CustomerController extends Controller
{
    public function ClientCreateAccount(Request $request){
         $this->validate($request,[
            'fullname' => 'required|string|max:255',
            'phone' => 'required|numeric|min:10|unique:customers,phone',
            'email' => 'required|string|email|max:255|unique:customers,email',
            'password' => 'required|string|confirmed|between:8,255',
            'password_confirmation' => 'required',
        ],[
            'fullname.required' => 'name field is required ',
        ]);

        $agent=Customer::create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if(auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $rand=rand(10000,100000);
            $id=Crypt::encryptString((auth()->guard('customer')->user()->id.$rand));
            return redirect(route('CustomerDashboard',$id));
        }

    }

    public function SingleProperty(){
    	return view('PropertySingle');
    }

    public function CustomerCreateAccount(){
    	return view('AgentAccount.CustomerAccount');
    }

    public function Contact(){
    	return view('Contact');
    }

    public function GuestContacting(Request $request){
    	$request->validate([
            'name'=> 'required|string',
            'subject' => 'required|max:255',
            'message' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $sent_date=date('d')." ".date('M').".".date('Y');
        $sent_time=date('h:i a');

        $form=new Contact();
        $form->name= $request->name;
        $form->email= $request->email;
        $form->subject= $request->subject;
        $form->message= $request->message;
        $form->sent_date= $sent_date;
        $form->sent_time= $sent_time;
        $form->save();

        return redirect()->back()->with('contact_sent','message sent ,we replied you soon !');
    }

    public function CustomerHome(){
        return view('Users.Customer.home');
    }

     public function ContactAdmin(){
        return view('Users.Customer.contact');
    }

    public function ManageAccount(){
        return view('Users.Customer.account');
    }

    public function UpdateFullName(Request $request){
        $customer_id=auth()->guard('customer')->user()->id;
        $data =Customer::find($customer_id);
        $data->fullname = $request->fullname;
        $data->save();

        return redirect()->back()->with('fullname_changed','Fullname  changed well !');

    }

    public function UpdatePhone(Request $request){
        $customer_id=auth()->guard('customer')->user()->id;
        $data =Customer::find($customer_id);
        $data->phone = $request->phone;
        $data->save();

        return redirect()->back()->with('phone_changed','Phone changed well !');

    }

      public function UpdateEmail(Request $request){
        $request->validate([
            'email' => 'unique:customers,email'
        ]);
        $customer_id=auth()->guard('customer')->user()->id;
        $data =Customer::find($customer_id);
        $data->email = $request->email;
        $data->save();

        return redirect()->back()->with('Email_changed','Email changed well !');

    }

     public function CreatePassword(Request $request){
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|max:100',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('customer')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Customer::whereId(auth()->guard('customer')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }



}
