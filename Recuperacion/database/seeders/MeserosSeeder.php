<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeserosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Meseros creados a partir de tinker
        DB::table('meseros')->insert([
            'nombre' => "Fernando Gutierrez",
            'edad' => 25,
            'telefono' => "8349213091",
            'correo' => "mesero1@meseros.com",
            'mesa_asignada' => 1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('meseros')->insert([
            'nombre' => "Omar Perez",
            'edad' => 31,
            'telefono' => "8340213945",
            'correo' => "mesero2@meseros.com",
            'mesa_asignada' => 2,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('meseros')->insert([
            'nombre' => "Ana Hernandez",
            'edad' => 21,
            'telefono' => "8345679231",
            'correo' => "mesero3@meseros.com",
            'mesa_asignada' => 3,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('meseros')->insert([
            'nombre' => "Karla Zapata",
            'edad' => 23,
            'telefono' => "8341023044",
            'correo' => "mesero4@meseros.com",
            'mesa_asignada' => 4,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
