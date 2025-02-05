<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{


    protected $fillable = ['user_id', 'balance','fee'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    protected $casts = [
        'balance' => 'encrypted', // Automatically encrypt/decrypt the balance
    ];

}
