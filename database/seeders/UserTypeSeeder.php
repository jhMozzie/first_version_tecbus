<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        UserType::create(['name' => 'Estudiante', 'status' => 1]);
        UserType::create(['name' => 'Profesor', 'status' => 1]);
        UserType::create(['name' => 'Administrador', 'status' => 1]);
        UserType::create(['name' => 'Conductor', 'status' => 1]);
    }
}
