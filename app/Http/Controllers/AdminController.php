<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


// category model 

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:categories,category_name',
        ]);

        $existingCategory = Category::where('category_name', $request->name)->first();

        if ($existingCategory) {
            return Redirect::back()->withErrors(['error' => 'Category already exists']);
            // return redirect()->back()->with(['error' => 'Category already exists']);
        } else {
            // Category doesn't exist, proceed with creating the new category
            $category = new Category();
            $category->category_name = $request->name;
            $category->save();

            return redirect()->back()->with(['message' => 'Category added successfully']);
        }


    }


    // delete_category function with validations 
    public function delete_category($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            // return redirect()->back()->with(['message' => 'Category deleted successfully']);
            return redirect()->back();
        }
        // else {
        //     return redirect()->back()->with(['error' => 'Category not found']);
        // }
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.products', compact('category'));
    }


    public function add_product(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // // Handle file upload for image
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $image->storeAs('public/images/products', $imageName);
        // } else {
        //     $imageName = null; 
        // }

        // Create a new product instance
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price ?? null;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        $imageName = time() . '_' . $image->getClientOriginalName();
        $request->image->move('products', $imageName);
        $product->image = $imageName;

        $product->save();

        return redirect()->back()->with(['message' => 'Product added successfully']);
    }

    public function show_product()
    {
        $products = Product::all();
        return view('admin.show_product', compact('products'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->back()->with(['message' => 'Product deleted successfully']);
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('product', 'category'));
    }

    // update_product_api by id
    public function update_product_api(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new product instance
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price ?? null;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $request->image->move('products', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->back()->with(['message' => 'Product updated successfully']);
    }
}