<?php

namespace App\Http\Controllers\Backend;

use App\Models\FixedDeposit;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FixedDepositController extends Controller
{
    // Display all the fixed deposits of the user
    public function index()
    {
        $fixedDeposits = Auth::user()->fixedDeposits;
        return view('fixed_deposits.index', compact('fixedDeposits'));
    }

    // Create a new fixed deposit
    public function create()
    {
        return view('fixed_deposits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',  // Minimum FD amount
            'interest_rate' => 'required|numeric|min:1|max:20',  // Interest between 1% to 20%
            'duration' => 'required|numeric|min:6',  // Minimum FD duration 6 months
        ]);

        $userWallet = Auth::user()->wallet;

        // Check if the user has sufficient balance
        if ($userWallet->balance < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient funds in wallet.');
        }

        // Calculate end date based on duration (months)
        $endDate = now()->addMonths($request->duration);

        // Deduct the amount from user's wallet
        $userWallet->decrement('balance', $request->amount);

        // Create Fixed Deposit
        $fixedDeposit = FixedDeposit::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'interest_rate' => $request->interest_rate,
            'start_date' => now(),
            'end_date' => $endDate,
            'status' => 'active',
        ]);

        return redirect()->route('fixed_deposit.index')->with('success', 'Fixed Deposit created successfully.');
    }

    // Calculate the interest for the fixed deposit
    public function calculateInterest($fixedDeposit)
    {
        $deposit = FixedDeposit::findOrFail($fixedDeposit);
        $timeInYears = $deposit->start_date->diffInYears($deposit->end_date);

        // Annual Interest Calculation
        $interest = ($deposit->amount * $deposit->interest_rate / 100) * $timeInYears;

        return $interest;
    }

    // Withdraw fixed deposit after maturity
    public function withdraw($fixedDeposit)
    {
        $deposit = FixedDeposit::findOrFail($fixedDeposit);

        // Check if the deposit is matured
        if ($deposit->status !== 'active' || $deposit->end_date > now()) {
            return redirect()->back()->with('error', 'Deposit is not yet matured.');
        }

        // Calculate interest earned
        $interest = $this->calculateInterest($deposit);

        // Add principal + interest to the user's wallet
        $userWallet = $deposit->user->wallet;
        $userWallet->increment('balance', $deposit->amount + $interest);

        // Mark deposit as withdrawn
        $deposit->update(['status' => 'withdrawn']);

        return redirect()->route('fixed_deposit.index')->with('success', 'Fixed Deposit withdrawn successfully with interest.');
    }
}
