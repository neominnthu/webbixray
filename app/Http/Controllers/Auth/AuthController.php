<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Wallet;

class AuthController extends Controller
{
    //show login form
    public function showlogin()
    {
        return view('backend.auth.login');
    }
     //show register form
    public function showregister()
    {
        return view('backend.auth.register');
    }

    //Validation First
    // Process Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters long',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Login Successful');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Process Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'referral_code' => 'nullable|exists:users,referral_code',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords do not match',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

            // Create a wallet for the new user
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0.00, // Default balance
            ]);

        // If a referral code was used
        if ($request->referral_code) {
            $referrer = User::where('referral_code', $request->referral_code)->first();

            if ($referrer) {
                Referral::create([
                    'user_id' => $referrer->id,
                    'referred_user_id' => $user->id,
                    'referral_code' => $request->referral_code,
                    'reward_points' => 100, // Reward amount
                    'status' => 'completed',
                ]);

                // Award points to the referrer
                $referrer->increment('reward_points', 100);
            }
        }

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }


        // Logout
        public function logout()
        {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logged out successfully.');
        }

}
