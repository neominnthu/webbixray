<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Wallet extends Model
{


    protected $fillable = ['user_id', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'balance' => 'encrypted', // Automatically encrypt/decrypt the balance
    ];

}
