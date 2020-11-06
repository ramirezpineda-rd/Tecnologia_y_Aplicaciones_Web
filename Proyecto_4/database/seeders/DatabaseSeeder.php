<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Llamar Seeder de categorias
        $this->call(CategoriaSedder::class);
        //Llamar seeder de usuarios
        $this->call(UsuarioSedder::class);

        // \App\Models\User::factory(10)->create();
    }
}
