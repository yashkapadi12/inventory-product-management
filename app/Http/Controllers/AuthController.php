<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   

    public function showLoginForm(){
        return view('auth.login');
    }

    public function showRegisterForm(){
        $roles = Role::all(); 
        return view('auth.register', compact('roles'));
    }

    public function showResetPasswordForm(){
        return view('auth.password-reset');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credentials = $request->only('email', 'password');
        try {
            // Attempt to authenticate the user
            if (Auth::guard('web')->attempt($credentials)) {
                // Create an access token for the authenticated user
                $token = auth()->user()->createToken('authToken')->accessToken; 
                session()->flash('success', 'Login successful!');
                $response = [
                    'success' => true,
                    'token' => $token
                ];
                return redirect()->route('product.index');
            } else {
                session()->flash('error', 'Invalid credentials. Please try again.');
                return redirect()->route('login')->withInput();
            }
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            \Log::error('Login error: ' . $e->getMessage());
            return redirect()->route('login')->withInput();
        }
    }
    public function resetPassword(Request $request)
    {   
        try {
            // Validate the incoming request
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:8|',
                'confirm_password' => 'required|same:password',
            ]);
            // Find the user by email
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();
                session()->flash('success', 'Password Updated successfully!');
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('password.reset')->withInput();
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::guard('web')->logout();
        session()->flash('success', 'You have been logged out successfully.');
        return redirect()->route('home');
    }
}
