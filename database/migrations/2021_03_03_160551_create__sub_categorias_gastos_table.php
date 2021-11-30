<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriasGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('subcategoriasgastos', function (Blueprint $table) {
            $table->id();
            $table->char('nombresubcategorias', 100);
            $table->enum('tipogastomensual', ['Fijo', 'Multiple'])->default('Fijo');
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
        Schema::dropIfExists('subcategoriasgastos');
    }
}
