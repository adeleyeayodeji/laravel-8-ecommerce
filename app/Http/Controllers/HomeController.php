<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function auth()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        //get email from request
        $email = $request->input('email');
        //get name from request
        $name = $request->input('name');
        //get password from request
        $password = $request->input('password');
        //validate request
        $this->validate($request, [
            'email' => 'required|email|unique:users'
        ]);
        //redirect back if email is not unique
        if (!$email) {
            return redirect()->back()->with('error', 'Email is required');
        }
        //create user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        //redirect to auth page
        return redirect()->back()->with('success', 'User created successfully');
    }

    public function login(Request $request)
    {
        //get and password
        $email = $request->input('email');
        $password = $request->input('password');
        //validate request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //redirect back if email or password is not valid
        if (!$email || !$password) {
            return redirect()->back()->with('error', 'Email or password is required');
        }
        //get user by email
        $user = User::where('email', $email)->first();
        //redirect back if user is not found
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        //redirect back if password is not valid
        if (!Hash::check($password, $user->password)) {
            return redirect()->back()->with('error', 'Password is not valid');
        }
        //redirect to home page
        Auth::login($user);
        return redirect()->intended('dashboard');
    }
}