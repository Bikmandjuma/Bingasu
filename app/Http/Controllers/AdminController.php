<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSocialMedia;

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
}
