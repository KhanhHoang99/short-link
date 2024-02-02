<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\RegisterRequest; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login()
    {
        //
       
        return view('user.pages.login');

    }


    //
    public function loginUser(Request $request)
    {
        //
       
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect('/admin');
            } elseif ($user->level == '0') {
                return redirect('/links');
            }
        }
    
        // Authentication failed
        return back()->with('error', 'Invalid login credentials');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage'); 
    }


    public function register()
    {
        //
       
        return view('user.pages.register');

    }


    public function store(RegisterRequest $request)
    {
      
        $user = User::create([
            'name' =>  $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
  
        auth()->login($user);
        
        return redirect()->route('links.index'); 

        

    }

}
