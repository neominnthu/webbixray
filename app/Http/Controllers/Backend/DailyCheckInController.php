<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyCheckIn;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DailyCheckInController extends Controller
{
    public function checkIn()
    {
        $user = Auth::user();
        $today = Carbon::today();

        // Check if the user has already checked in today
        $existingCheckIn = DailyCheckIn::where('user_id', $user->id)
            ->whereDate('date', $today)
            ->first();

        if ($existingCheckIn) {
            return back()->with('error', 'You have already checked in today.');
        }

        // Get the last check-in record
        $lastCheckIn = DailyCheckIn::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->first();

        // Calculate streak
        if ($lastCheckIn && $lastCheckIn->date->diffInDays($today) == 1) {
            $streak = $lastCheckIn->streak + 1;
        } else {
            $streak = 1;
        }

        // Store check-in record
        DailyCheckIn::create([
            'user_id' => $user->id,
            'date' => $today,
            'streak' => $streak,
        ]);

        // Calculate reward
        $reward = 5 + ($streak * 2); // Base reward + streak bonus

        // Update user's wallet balance
        //$user->increment('reward_points', $reward);
        $currentBalance = $user->reward_points;

        // Increment the balance
        $newBalance = $currentBalance + $reward;

        // Update the balance with the new incremented value (encrypted automatically)
        $user->update(['reward_points' => $newBalance]);
        $user->save;

        return back()->with('message', "Check-in successful! You earned $reward points.");
    }
}
