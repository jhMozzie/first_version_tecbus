<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'dni' => '74499120',
            'name' => 'Joseph',
            'lastname' => 'Flores',
            'email' => 'joseph@tecsup.edu.pe',
            'phone' => '976202040',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'user_type_id' => 1, // Ajusta el ID según tus tipos de usuario
            'status' => 1,
        ]);

        User::create([
            'dni' => '64499120',
            'name' => 'Jaime',
            'lastname' => 'Farfan',
            'email' => 'jfarfan@tecsup.edu.pe',
            'phone' => '9876543210',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'user_type_id' => 2, // Ajusta el ID según tus tipos de usuario
            'status' => 1,
        ]);

        User::create([
            'dni' => '55555555',
            'name' => 'Jemal',
            'lastname' => 'Leon',
            'email' => 'lito@tecsup.edu.pe',
            'phone' => '505555555',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'user_type_id' => 3, // Ajusta el ID según tus tipos de usuario
            'status' => 1,
        ]);

        User::create([
            'dni' => '14499120',
            'name' => 'Alvaro',
            'lastname' => 'Lluvians',
            'email' => 'alluvians@tecsup.edu.pe',
            'phone' => '4055555555',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'user_type_id' => 4, // Ajusta el ID según tus tipos de usuario
            'status' => 1,
        ]);
    }
}
