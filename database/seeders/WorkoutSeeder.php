<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Workout;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        $workouts = [
            [
                'workout_desc' => 'Ficha de Treino A (Push)',
                'expiration_date' => '2026/06/25',
                'maximum_sections' => 40,
                'user_id' => 1
            ],
            [
                'workout_desc' => 'Ficha de Treino B (Pull)',
                'expiration_date' => '2026/06/25',
                'maximum_sections' => 40,
                'user_id' => 1
            ],
            [
                'workout_desc' => 'Ficha de Treino C (Legs)',
                'expiration_date' => '2026/06/25',
                'maximum_sections' => 30,
                'user_id' => 1
            ]
        ];

        foreach($workouts as $w) {
            Workout::create([
                'workout_desc' => $w['workout_desc'],
                'expiration_date' => $w['expiration_date'],
                'maximum_sections' => $w['maximum_sections'],
                'user_id' => $w['user_id']
            ]);
        }
    }
}
