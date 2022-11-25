<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSocialMedia;
use App\Models\Admin;

class HomepageController extends Controller
{
    public function Welcome(){
    	$Admin_Social_Media=AdminSocialMedia::all();
    	$Admin_fname=Admin::get('firstname');
    	return view('Cover',['admin_media' =>$Admin_Social_Media,'admin_name' =>$Admin_fname]);
    }
}
