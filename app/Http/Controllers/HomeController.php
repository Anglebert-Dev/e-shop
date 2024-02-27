<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function redirect(){
        $userType = Auth::user()->user_type;
        if($userType == "admin"){
            return redirect('admin.home');
    }
    else{
        return redirect('dashboard');
    }
    }
}
