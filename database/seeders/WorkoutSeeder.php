<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        $workout = [
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
    }
}
