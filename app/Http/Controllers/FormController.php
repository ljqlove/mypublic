<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\form;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function form(Request $request){
        $data = Request::file('img');
        $filename = time().rand(10000000,999999999);
        $suffix = $data->getClientOriginalExtension();
        $dirname = './upload/';
        $file = $filename .'.'.$suffix;
        $data->move($dirname,$file);
        $form=new form;
        $form->img=$dirname.$file;
        $form->save();
        return redirect('imgList');
    }
}
