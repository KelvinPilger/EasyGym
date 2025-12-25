<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EquipmentSeeder::class,
            MuscleGroupSeeder::class,
            ExerciseSeeder::class,
            WorkoutSeeder::class,
        ]);
    }
}
