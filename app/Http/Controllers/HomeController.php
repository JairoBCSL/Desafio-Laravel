<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('site.home');
    }

    public function login(){
        return view('site.login');
    }

    public function logout(){
        return view('site.logout');
    }
}
