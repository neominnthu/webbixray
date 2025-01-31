<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function payWithWallet(Request $request)
    {
        $wallet = Auth::user()->wallet;
        $totalAmount = Cart::getTotal();

        if ($wallet->balance < $totalAmount) {
            return redirect()->back()->with('error', 'Not enough balance in wallet.');
        }

        // Deduct from wallet
        $wallet->decrement('balance', $totalAmount);

        WalletTransaction::create([
            'user_id' => Auth::id(),
            'amount' => $totalAmount,
            'type' => 'debit',
            'description' => 'Payment for order',
        ]);

        // Process order
        Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalAmount,
            'status' => 'paid',
        ]);

        Cart::clear();
        return redirect()->route('dashboard')->with('success', 'Order placed using wallet balance!');
    }

}
