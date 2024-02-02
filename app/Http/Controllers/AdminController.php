<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        //
        $users = User::all();
        return view('admin.pages.all-user',  ['users' =>  $users]);

    }

    public function detaiUser(string $id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Retrieve all links associated with the user
        $links = $user->links()->with('category')->get();

        return view('admin.pages.detail-user', ['links' => $links , 'user' =>  $user]);
    }


    public function categories()
    {
        //
        $categories = Category::all();
        return view('admin.pages.category',  ['categories' =>  $categories]);

    }

    public function addCategory(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->id;

        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }
    
        $category->delete();
    
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    public function detaiCategory(string $id)
    {
        // Retrieve the user by ID
        $category = Category::findOrFail($id);

        // Retrieve all links associated with the user
        $links = $category->links()->with('user')->get();

        return view('admin.pages.detail-category', ['links' => $links , 'category' =>  $category]);
    }
    


}
