<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestioningresos', function (Blueprint $table) {
            $table->id();
            $table->char('nombre_tipo_entradas', 100);
            $table->enum('estado', ['Positivo', 'Negativo'])->default('Positivo');
            $table->enum('tipo_ingreso', ['Unico', 'Multiple Mensual'])->default('Unico');
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
        Schema::dropIfExists('gestioningresos');
    }
}
