<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define task types
        $taskTypes = [
            'daily' => 10,
            'weekly' => 10,
            'monthly' => 10,
        ];

        foreach ($taskTypes as $type => $count) {
            for ($i = 1; $i <= $count; $i++) {
                Task::create([
                    'title' => ucfirst($type) . " Task $i",
                    'description' => "This is a $type task number $i.",
                    'points' => rand(5, 50), // Random points
                    'status' => 'active', // Not completed
                    'type' => $type, // daily, weekly, or monthly
                    'user_id'=> 1,
                ]);
            }
        }
    }
}
