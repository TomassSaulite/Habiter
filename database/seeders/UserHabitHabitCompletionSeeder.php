<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Habit;
use App\Models\HabitCompletion;
use Carbon\Carbon;

class UserHabitHabitCompletionSeeder extends Seeder
{
    public function run(): void
    {
        // --------------------------
        // 1️⃣ Create Users
        // --------------------------
        $users = [
            ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => Hash::make('password')],
            ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => Hash::make('password')],
            ['name' => 'Charlie', 'email' => 'charlie@example.com', 'password' => Hash::make('password')],
        ];

        foreach ($users as $u) {
            User::create($u);
        }

        $allUsers = User::all();

        // --------------------------
        // 2️⃣ Create Habits
        // --------------------------
        $habitTemplates = [
            ['name' => 'Drink Water', 'description' => 'Drink at least 8 glasses of water'],
            ['name' => 'Exercise', 'description' => 'Do at least 30 minutes of exercise'],
            ['name' => 'Read', 'description' => 'Read at least 20 pages of a book'],
        ];

        foreach ($allUsers as $user) {
            foreach ($habitTemplates as $template) {
                Habit::create([
                    'user_id' => $user->id,
                    'name' => $template['name'],
                    'description' => $template['description'],
                ]);
            }
        }

        $allHabits = Habit::all();

        // --------------------------
        // 3️⃣ Create Habit Completions
        // --------------------------
        foreach ($allHabits as $habit) {
            // Create 3-7 completion records per habit, spread over past week
            $daysAgo = rand(0, 6); // number of days ago for the first completion
            $completionsCount = rand(3, 7);

            for ($i = 0; $i < $completionsCount; $i++) {
                HabitCompletion::create([
                    'habit_id' => $habit->id,
                    'completed' => true,
                    'completed_at' => Carbon::now()->subDays($daysAgo + $i),
                ]);
            }
        }
    }
}
