<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class WalletTransaction extends Model
{

    protected $fillable = ['wallet_id', 'type', 'amount', 'recipient_wallet_id'];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    // Encrypt the transaction amount before saving
    protected $casts = [
        'amount' => 'encrypted', // Automatically encrypt/decrypt the balance
    ];
}
