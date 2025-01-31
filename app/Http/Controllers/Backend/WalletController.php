<?php

namespace App\Http\Controllers\Backend;

use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    // Show wallet balance
    public function index()
    {
        $wallet = Auth::user()->wallet;
        $transactions = WalletTransaction::where('user_id', Auth::id())->latest()->get();

        return view('backend.wallet.index', compact('wallet', 'transactions'));
    }

    // Add funds to the wallet
    public function addFunds(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $wallet = Auth::user()->wallet;
        $wallet->increment('balance', $request->amount);

        WalletTransaction::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'type' => 'credit',
            'description' => 'Wallet top-up',
        ]);

        return redirect()->back()->with('success', 'Funds added successfully!');
    }


    // Use wallet funds for purchases
    public function useFunds(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $wallet = Auth::user()->wallet;

        if ($wallet->balance < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient funds!');
        }

        $wallet->decrement('balance', $request->amount);

        WalletTransaction::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'type' => 'debit',
            'description' => 'Wallet payment for order',
        ]);

        return redirect()->back()->with('success', 'Payment successful!');
    }

}
