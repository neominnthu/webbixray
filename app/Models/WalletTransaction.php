<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class WalletTransaction extends Model
{


    protected $fillable = ['user_id', 'amount', 'type', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Encrypt the transaction amount before saving
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = Crypt::encryptString($value);
    }

    // Decrypt the transaction amount when retrieving it
    public function getAmountAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
