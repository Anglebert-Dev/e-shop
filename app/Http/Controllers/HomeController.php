<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index(){
        return view('home.userpage');
    }
    public function redirect(){
        $userType = Auth::user()->user_type;
        if($userType == "admin"){
            return view('admin.home');
    }
    else{
        return view('home.userpage');
    }
    }
}
