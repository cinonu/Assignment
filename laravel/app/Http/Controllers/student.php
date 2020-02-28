<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class student extends Controller
{
    function addinfo(Request $req)
    {
    $data =  [
                $req->input('name'),
                $req->input('email')
    ];
      dd($data);
    
    }
    
}
