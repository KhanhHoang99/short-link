<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest; 
use App\Models\Category;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('mainPage', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkRequest $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        $link = Link::create(array_merge($request->validated(), ['user_id' => $userId]));

        return redirect()->route('links.index')->with('success', 'Link created successfully');
        
    }


    public function redirectLink($shortLink)
    {
        $link = Link::where('short_link', $shortLink)->first();

        if ($link) {

            // Increment visit count 
            $link->increment('visit_count');

            // Redirect to the original link
            return redirect()->away($link->original_link);
            
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Retrieve all links associated with the user
        $links = $user->links;

        return view('user.pages.your-link', ['links' => $links]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = Link::find($id);

        if (!$link) {
            return redirect()->back()->with('error', 'Link not found');
        }

        $link->delete();

        return redirect()->back()->with('success', 'Link deleted successfully');
    
    }
}
