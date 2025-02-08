<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Wallet extends Model
{
    use HasFactory;

    protected $casts = [
        'balance' => 'encrypted',
        'reward_points' => 'encrypted',
    ];

    protected $fillable = ['user_id', 'balance', 'reward_points', 'level' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }


}
