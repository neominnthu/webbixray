<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Wallet;
use App\Models\Referral;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    //show login form
    public function showlogin()
    {

        return view('backend.auth.login');
    }
     //show register form
    public function showregister(Request $request)
    {
        // Extract referral code from the URL
        $referralCode = $request->query('ref');
        return view('backend.auth.register', compact('referralCode'));
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        //    'referral_code' => 'nullable|string|exists:users,referral_code',
        ]);

        // Find the user who referred
        $referrer = User::where('referral_code', $request->referral_code)->first();
        if ($referrer && $referrer->id === Auth::id()) {
            return redirect()->back()->withErrors(['referral_code' => 'You cannot refer yourself.']);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'reward_points' => 0,
            'referred_by' => $referrer ? $referrer->id : null,
        ]);

            // Create a wallet for the new user
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0.00, // Default balance
            ]);
            $user->assignRole(4);

            if ($referrer) {
                $this->rewardReferrer($referrer);
            }


            Auth::login($user);


        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }


        // Logout
        public function logout()
        {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logged out successfully.');
        }

        private function rewardReferrer(User $referrer)
        {
            $reward = 10;
            //$referrer->increment('reward_points', 10); // Example reward
                    // Update user's wallet balance
        //$user->increment('reward_points', $reward);
        $currentBalance = $referrer->reward_points;

        // Increment the balance
        $newBalance = $currentBalance + $reward;

        // Update the balance with the new incremented value (encrypted automatically)
        $referrer->update(['reward_points' => $newBalance]);
        $referrer->save;
        }

}
