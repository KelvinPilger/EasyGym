<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@gmail.com'],
        [
            'username' => 'Admin',
            'password' => Hash::make('1234'),
            'cpf' => '00000000000',
            'role' => 'Admin',
            'sex' => 'M',
        ]);

        User::updateOrCreate(['email' => 'teste@gmail.com'],
        [
            'username' => 'Teste de aluno',
            'password' => Hash::make('123456'),
            'cpf' => '11111111111',
            'role' => 'Aluno',
            'sex' => 'F'
        ]);
    }
}
