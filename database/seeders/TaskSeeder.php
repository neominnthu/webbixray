<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['title' => 'Daily Check-in', 'description' => 'Log in every day to claim your daily reward.', 'reward' => 5, 'status' => 'active'],
            ['title' => 'Invite a Friend', 'description' => 'Share your referral link and get rewarded when a new user signs up.', 'reward' => 10, 'status' => 'active'],
            ['title' => 'Buy & Earn', 'description' => 'Make any purchase today and receive bonus rewards.', 'reward' => 5, 'status' => 'active'],
            ['title' => 'Share on Social Media', 'description' => 'Share our platform on Facebook, Twitter, or Instagram and earn rewards.', 'reward' => 3, 'status' => 'active'],
            ['title' => 'Watch & Earn', 'description' => 'Watch a 30-second video ad and earn a reward.', 'reward' => 2, 'status' => 'active'],
            ['title' => 'Rate & Review', 'description' => 'Leave a review on a product or service and get rewarded.', 'reward' => 4, 'status' => 'active'],
            ['title' => 'Quick Poll', 'description' => 'Participate in a daily poll and share your opinion.', 'reward' => 2, 'status' => 'active'],
            ['title' => 'Store Visit', 'description' => 'Visit our store section and explore new deals.', 'reward' => 1, 'status' => 'active'],
            ['title' => 'Knowledge Quiz', 'description' => 'Answer a short quiz correctly to win rewards.', 'reward' => 3, 'status' => 'active'],
            ['title' => 'Your Story Matters', 'description' => 'Share your experience using our platform and earn rewards.', 'reward' => 5, 'status' => 'active'],
        ];

        DB::table('tasks')->insert($tasks);
    }
}
