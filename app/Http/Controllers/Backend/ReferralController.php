<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function generateReferralLink()
    {
        $user = Auth::user();
        $referralLink = route('register', ['referral_code' => $user->referral_code]);

        return response()->json(['referral_link' => $referralLink]);
    }
}
