<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habits;

class HabitSeeder extends Seeder
{
    public function run(): void
    {
        // Habit templates
        $habitTemplates = [
            ['Meditate', '10 minutes mindfulness'],
            ['Drink Water', '8 glasses per day'],
            ['Read', 'Read 20 pages'],
            ['Exercise', '30 minutes movement'],
            ['Journal', 'Write daily reflection'],
            ['Stretch', '5 minutes stretching'],
            ['Sleep Early', 'In bed by 11pm'],
            ['No Sugar', 'Avoid sugary snacks'],
            ['Walk', '10,000 steps'],
            ['Plan Day', 'Plan tomorrow’s tasks'],
        ];

        // Users to create habits for
        $userIds = [1, 2, 3, 4, 5];

        foreach ($userIds as $userId) {
            foreach ($habitTemplates as [$name, $description]) {
                Habits::create([
                    'user_id' => $userId,
                    'name' => $name,
                    'description' => $description,
                ]);
            }
        }
    }
}
