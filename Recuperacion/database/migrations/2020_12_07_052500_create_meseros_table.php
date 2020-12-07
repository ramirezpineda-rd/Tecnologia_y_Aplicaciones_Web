<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeserosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla de mesas con el id y nombre
        Schema::create('mesas', function (Blueprint $table){
            $table->id();
            $table->string("nombre");
            $table->timestamps();
        });
        //Tabla de meseros con la documentación pertinente
        Schema::create('meseros', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("edad");
            $table->string("telefono");
            $table->string("correo");
            $table->foreignId("mesa_asignada")->references("id")->on("mesas");
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meseros');
    }
}
