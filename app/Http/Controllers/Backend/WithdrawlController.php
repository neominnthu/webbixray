<?php

namespace App\Http\Controllers\Backend;

use App\Models\WithdrawalRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawlController extends Controller
{
    // Show withdrawal form
    public function create()
    {
        return view('wallet.withdraw');
    }

    // Handle withdrawal request
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
            'account_holder_name' => 'required|string|max:255',
        ]);

        $wallet = Auth::user()->wallet;

        if ($wallet->balance < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient funds.');
        }

        // Create withdrawal request
        WithdrawalRequest::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'status' => 'pending',
        ]);

        // Deduct amount from wallet temporarily (will be restored if rejected)
        $wallet->decrement('balance', $request->amount);

        return redirect()->route('wallet.index')->with('success', 'Withdrawal request submitted!');
    }

    // List withdrawals for admin
    public function adminIndex()
    {
        $withdrawals = WithdrawalRequest::where('status', 'pending')->latest()->get();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    // Approve or reject withdrawal request
    public function updateStatus(Request $request, WithdrawalRequest $withdrawal)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        if ($request->status == 'approved') {
            // TODO: Process actual payment via bank transfer API
        } else {
            // Restore balance if rejected
            $withdrawal->user->wallet->increment('balance', $withdrawal->amount);
        }

        $withdrawal->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Withdrawal request updated.');
    }
}
