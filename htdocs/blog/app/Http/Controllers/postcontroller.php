<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App \ post;

    class postcontroller 
    {
        public function index($id)
            {
             
             $post = post::where('id',$id)->first();
             
             // $array = array(1,2,3,4);
             return view('test',compact('post'));
            }
    }

