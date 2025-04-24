<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre' => 'Michael',
            'apellido' => 'Rocha',
            'cod_tipo_fk' => 'D',
            'tipo_documento' => 'CC',
            'numero_documento' => '123456789',
            'edad' => 18,
            'email' => 'deportista@correo.com',
            'fecha_nacimiento' => '2007-01-29',
            'genero' => 'Masculino',
            'password' => Hash::make('michael123'),
        ]);
        DB::table('users')->insert([
            'nombre' => 'Michael',
            'apellido' => 'Rocha',
            'cod_tipo_fk' => 'A',
            'tipo_documento' => 'CC',
            'numero_documento' => '1012349210',
            'edad' => 18,
            'email' => 'michael@correo.com',
            'fecha_nacimiento' => '2007-01-29',
            'genero' => 'Masculino',
            'password' => Hash::make('michael123'),
        ]);
    }
}
