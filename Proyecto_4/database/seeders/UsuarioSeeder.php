<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insertar datos por default a la tabla usuarios
        DB::table('users')->insert([
            'name'=>'Mario Rdz',
            'email'=>'correo1@correo.com',
            'password'=>Hash::make('12345678'),

        ]);
    }
}
