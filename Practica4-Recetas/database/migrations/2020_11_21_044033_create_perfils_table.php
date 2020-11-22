<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) 
        {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('biografia')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }
            //Para que las personas puedan escribir sobre ellos
            //La imagen es opcional por eso es nullable.

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfils');
    }
}
