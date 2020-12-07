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
        $this->call(UsuarioSeeder::class);
        $this->call(MesasSeeder::class);
        $this->call(MeserosSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
