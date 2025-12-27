<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkoutSession;

class WorkoutSessionSeeder extends Seeder
{
    public function run(): void
    {
        $workoutSession = [
            [
                'workout_id' => 1,
                'started_at' => '2025/12/28 08:57:12',
                'finished_at' => '2025/12/28 11:21:00'
            ],
            [
                'workout_id' => 2,
                'started_at' => '2025/12/29 06:48:19',
                'finished_at' => '2025/12/29 08:15:50'
            ]
        ];

        foreach($workoutSession as $w) {
            WorkoutSession::create([
                'workout_id' => $w['workout_id'],
                'started_at' => $w['started_at'],
                'finished_at' => $w['finished_at']
            ]);
        }
    }
}
