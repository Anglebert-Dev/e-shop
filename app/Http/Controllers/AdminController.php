<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


// category model 

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
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

}
