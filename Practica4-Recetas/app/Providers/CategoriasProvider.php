<?php

namespace App\Providers;

use View;

use App\Models\CategoriaReceta;
use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*Se colocan las depedencias que se van a configurar, aunque no estén
        los codigos en Laravel, registra todo antes de que Laravel comience, es
        para hacer uso de archivos que no son de Laravel*/
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*Se ejecuta todo cuando la aplicación ya esta lista.
        es para requerir el uso de algo de Laravel*/
        View::composer('*', function($view){
            $categorias = CategoriaReceta::all();
            $view->with('categorias', $categorias);

        });
        //Comodin '*' que dice que a todas las vistas les va a pasar las categorias.

    }
}
