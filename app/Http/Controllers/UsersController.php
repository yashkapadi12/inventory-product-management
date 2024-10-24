<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {   

        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email', // Ensure the email is unique
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'role_id' => 'required|exists:roles,id'
            ]);
            // Create a new user
            $registerUser = new User();
            $registerUser->name = $request->name;
            $registerUser->email = $request->email;
            $registerUser->password = bcrypt($request->password);
            $registerUser->role_id = $request->role_id;
            $registerUser->save();

            session()->flash('success', 'User registered successfully');

            return redirect()->route('login');

        } catch (\Throwable $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('register')->withInput();
        }
    }
    

}
