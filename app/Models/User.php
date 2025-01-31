<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function withdrawalRequests()
    {
        return $this->hasMany(WithdrawalRequest::class);
    }

    public function taskCompletions()
    {
        return $this->hasMany(TaskCompletion::class);
    }

    public function walletTransfersSent()
    {
        return $this->hasMany(WalletTransfer::class, 'sender_id');
    }

    public function walletTransfersReceived()
    {
        return $this->hasMany(WalletTransfer::class, 'receiver_id');
    }

    public function fixedDeposits()
    {
        return $this->hasMany(FixedDeposit::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->referral_code = Str::random(8);
            $user->save();
        });
    }
}
