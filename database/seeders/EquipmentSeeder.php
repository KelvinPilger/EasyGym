<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $equipments = [
            'Halteres',
            'Barra Supino',
            'Leg Press 45°',
            'Leg Press 90°',
            'Hack de Agachamento 45°',
            'Polia',
            'Máquina de Ombro',
            'Máquina Supino',
            'Máquina Remada',
            'Kettlebell'
        ];

        foreach($equipments as $e) {
            Equipment::create([
                'name' => $e,
            ]);
        }
    }
}
