<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->quantity = $request->quantity;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            // dd($product);
        } else {
            return redirect('login');
        }
    }

}