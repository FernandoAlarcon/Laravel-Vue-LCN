<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriasgastos', function (Blueprint $table) {
            $table->id();
            $table->char('nombrecategorias', 100);
            $table->enum('tipocategoria', ['Gasto vital', 'Gasto no vital'])->default('Gasto vital');
            $table->enum('estadocategoria', ['Activado', 'Desactivado'])->default('Activado');
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
        Schema::dropIfExists('categoriasgastos');
    }
}
