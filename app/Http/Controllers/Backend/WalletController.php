<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    private $transferFeePercentage = 2; // 2% fee on transfers
    private $withdrawalFee = 1.00; // Fixed $1 fee on withdrawals
    // Show Wallet Dashboard
    public function index(Request $request)
    {
        $wallet = Auth::user()->wallet;
        $transactions = $wallet ? $wallet->transactions()->latest()->get() : [];
        return view('backend.wallets.index', compact('wallet','transactions')) ->with('i', ($request->input('page', 1) - 1) * 10);
    }


}
