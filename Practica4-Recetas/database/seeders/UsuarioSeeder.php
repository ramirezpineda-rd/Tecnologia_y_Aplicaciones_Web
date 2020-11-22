<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        //Para crear dinamicamente a los usuarios
        $user = User::create([
            'name'=>'Ruben Dario',
            'email'=>'correo1@correo.com',
            'password'=>Hash::make('12345678'),
            'url'=>'www.upv.com',
        ]);
      

        $user2 = User::create([
            'name'=>'Mario Rdz',
            'email'=>'correo2@correo.com',
            'password'=>Hash::make('12345678'),
            'url'=>'www.upv.com',
        ]);
    

    }
}
