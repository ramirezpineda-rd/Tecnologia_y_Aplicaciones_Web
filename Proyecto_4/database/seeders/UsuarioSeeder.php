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
            'email'=>'correo2@correo.com',
            'password'=>Hash::make('12345678'),
            'url'=>'www.upv.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=>'Ruben Dario',
            'email'=>'correo1@correo.com',
            'password'=>Hash::make('12345678'),
            'url'=>'www.upv.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

    }
}
