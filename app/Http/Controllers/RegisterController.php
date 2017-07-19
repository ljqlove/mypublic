<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Hash;

class RegisterController extends Controller
{
    public function register() 
    {
        return view('home.session.register');
    }

    public function doRegister(RegisterRequest $request) 
    {
        //获取数据 入库
        $user = new User;
        $user -> name = $request->email;//
        $user -> password = Hash::make($request->input('password'));
        $user -> email = $request -> email;
        // 返回页面
        if($user->save()) {
            return redirect('/login')->with('info','success');
        }else{
            return back()->with('info','很抱歉，注册成功，请重新注册！！');
        }
    }
}
