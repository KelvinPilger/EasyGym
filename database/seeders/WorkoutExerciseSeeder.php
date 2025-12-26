<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkoutExercise;

class WorkoutExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $workoutExercises = [
            [
                'workout_id' => 1,
                'exercise_id' => 2,
                'section_label' => 'Triceps Pulley Corda 4x10',
                'repetitions' => 10,
                'series' => 4,
                'interval' => '1:30 min',
                'observation' => 'Posição ereta, braços colados ao corpo, não movimentar a parte superior do braço, apenas o antebraço.',
            ],
            [
                'workout_id' => 2,
                'exercise_id' => 1,
                'section_label' => 'Rosca Martelo no Halter 5x8',
                'repetitions' => 8,
                'series' => 5,
                'interval' => '2:00 min',
            ],
            [
                'workout_id' => 3,
                'exercise_id' => 3,
                'section_label' => 'Leg Press 45° 4x12',
                'repetitions' => 12,
                'series' => 4,
                'interval' => '2:30 min',
            ],
        ];

        foreach($workoutExercises as $w) {
            WorkoutExercise::create([
                'workout_id' => $w['workout_id'],
                'exercise_id' => $w['exercise_id'],
                'section_label' => $w['section_label'],
                'repetitions' => $w['repetitions'],
                'series' => $w['series'],
                'interval' => $w['interval'],
                'observation' => $w['observation'] ?? null
            ]);
        }
    }
}
