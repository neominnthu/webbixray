<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\WalletTransaction;

class WalletController extends Controller
{
    //
    private $transferFeePercentage = 2; // 2% fee on transfers
    private $withdrawalFee = 1.00; // Fixed $1 fee on withdrawals

    public function index()
    {
        $transactions = WalletTransaction::get();
        return view ('backend.wallets.index',compact('transactions'));
    }

    public function deposit()
    {

        return view ('backend.wallets.deposit');
    }

    public function withdraw()
    {
        return view ('backend.wallets.withdraw');
    }

    public function transfer()
    {
        return view ('backend.wallets.transfer');
    }
}
