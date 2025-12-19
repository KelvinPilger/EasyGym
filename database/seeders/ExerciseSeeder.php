<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exercises = [
            [
                'exercise_desc' => 'Rosca Martelo no Halter',
                'muscle_group_id' => 1,
                'equipment_id' => 1,
                'video_url' => 'https://www.youtube.com/shorts/QawLinw-TiU',
                'image_url' => 'https://treinomestre.com.br/rosca-martelo/'
            ],
            [
                'exercise_desc' => 'Triceps Pulley Corda',
                'muscle_group_id' => 2,
                'equipment_id' => 6,
                'video_url' => 'https://www.youtube.com/shorts/-QGC1cL6ETE',
                'image_url' => 'https://muscu-street-et-crossfit.fr/extension-triceps-poulie-haute/'
            ],
            [
                'exercise_desc' => 'Quadríceps no Leg Press 45°',
                'muscle_group_id' => 8,
                'equipment_id' => 3,
                'video_url' => 'https://www.youtube.com/watch?v=waAxlYvtCcI',
                'image_url' => 'https://treinoemalta.com.br/leg-press-45/'
            ]
        ];

        foreach($exercises as $e) {
            Exercise::create([
                'exercise_desc' => $e['exercise_desc'],
                'muscle_group_id' => $e['muscle_group_id'],
                'equipment_id' => $e['equipment_id'],
                'video_url' => $e['video_url'],
                'image_url' => $e['image_url']
            ]);
        }
    }
}
