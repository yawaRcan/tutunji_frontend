<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewController extends Controller
{
    //
    public function index(){
        return view('new.pages.home');
    }
    public function signIn(){
        return view('new.pages.sign-in');
    }
}
