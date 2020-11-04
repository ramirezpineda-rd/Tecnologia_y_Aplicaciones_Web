<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insertar datos por default a la tabla categoria
        DB::table('categoria_receta')->insert([
        'nombre'=>'Comida Me3xicana',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_receta')->insert([
            'nombre'=>'Comida Italiana',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            ]);


    }
}
