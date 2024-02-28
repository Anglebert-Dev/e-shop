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

    // view_product function validated well 
    public function view_product()
    {
        return view('admin.products');
    }

}
