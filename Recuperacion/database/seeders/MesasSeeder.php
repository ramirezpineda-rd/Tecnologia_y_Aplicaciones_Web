<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Número de mesas y fecha en la que se creo
        DB::table('mesas')->insert([
            'nombre' => "Mesa 1",
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('mesas')->insert([
            'nombre' => "Mesa 2",
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('mesas')->insert([
            'nombre' => "Mesa 3",
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('mesas')->insert([
            'nombre' => "Mesa 4",
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
