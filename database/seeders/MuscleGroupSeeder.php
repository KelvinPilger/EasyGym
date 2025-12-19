<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MuscleGroup;

class MuscleGroupSeeder extends Seeder
{
    public function run(): void
    {
        $muscleGroup = [
            'Bíceps',
            'Tríceps',
            'Ombro',
            'Trapézio',
            'Costas',
            'Peito',
            'Posterior',
            'Quadríceps',
            'Glúteos',
            'Panturrilha'
        ];

        foreach($muscleGroup as $mg) {
            MuscleGroup::create([
                'name' => $mg
            ]);
        }
    }
}
