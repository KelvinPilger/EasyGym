<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExerciseSession;

class ExerciseSessionSeeder extends Seeder
{
    public function run(): void
    {
        $exerciseSessions = [
            [
                'workout_session_id' => 1,
                'workout_exercise_id' => 1,
                'picked_weight' => 30,
                'series_made' => 4,
                'repetitions_total' => 32,
                'interval_made' => '1:30 min',
                'rpe' => '5',
                'pain_level' => '7'
            ],
            [
                'workout_session_id' => 2,
                'workout_exercise_id' => 2,
                'picked_weight' => 40,
                'series_made' => 5,
                'repetitions_total' => 40,
                'interval_made' => '2:00 min',
                'rpe' => '6',
                'pain_level' => '4'
            ]
        ];

        foreach($exerciseSessions as $e) {
            ExerciseSession::create([
                'workout_session_id' => $e['workout_session_id'],
                'workout_exercise_id' => $e['workout_exercise_id'],
                'picked_weight' => $e['picked_weight'],
                'series_made' => $e['series_made'],
                'repetitions_total' => $e['repetitions_total'],
                'interval_made' => $e['interval_made'],
                'rpe' => $e['rpe'],
                'pain_level' => $e['pain_level']
            ]);
        }
    }
}
