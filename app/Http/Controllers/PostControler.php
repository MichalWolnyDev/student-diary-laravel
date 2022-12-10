<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostControler extends Controller
{
    public function index(){
        return view('index');
    }
}
