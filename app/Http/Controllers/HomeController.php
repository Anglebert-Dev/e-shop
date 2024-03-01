<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $userType = Auth::user()->user_type;
        if ($userType == "admin") {
            return view('admin.home');
        } else {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }

    // public function product details by id 
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

}