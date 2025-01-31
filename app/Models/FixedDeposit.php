<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{

    protected $fillable = [
        'user_id',
        'amount',
        'interest_rate',
        'start_date',
        'end_date',
        'status'
    ];

    // Relationship with the User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
