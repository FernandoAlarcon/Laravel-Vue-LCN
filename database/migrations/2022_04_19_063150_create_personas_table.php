<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_lista', function (Blueprint $table) { 
            
            $table->id();
            
            $table->char('nombres', 50);
            $table->char('apellidos', 50);
            
            $table->enum('tipos_identificacion', ['C.I', 'T.I', 'P.C'])->default('C.I');
            $table->bigInteger('identificacion'); 
            
            $table->enum('sexo', ['Masculino', 'Femenino', 'X'])->default('X');
            $table->dateTime('fecha_nacimiento'); 

            $table->char('carrera', 250);
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
        Schema::dropIfExists('personas');
    }
}
