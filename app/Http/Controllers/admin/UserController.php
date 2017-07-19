<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use Hash;

class UserController extends Controller
{
    public function index()
    {
    	$user = new user;

    	$select=$user -> select()->get();
    	return view('admin.userList',['select'=>$select]);
    }

    public function update($id)
    {
    	$user = new user;
    	$res = $user->find($id);
    	return view('admin.userAdd',['res'=>$res]);
    }

    public function doUpdate()
    {
    	// dd($_POST['id']);
    	$user= new user;
    	$data = $user -> find($_POST['id']);
    	$data -> email = $_POST['email'];
    	$data -> password = Hash::make($_POST['password']);
    	$data -> save();
    	$select=$user -> select()->get();
    	return view('admin.userList',['select'=>$select]);
    }

    public function delete(Request $request)
    {
		$user = new user;
		$res = $user -> find($request);
		$res -> delete();
		$select=$user -> select()->get();
    	return view('admin.userList',['select'=>$select]);	
    }
}
