<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApuntesGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apuntesgastos', function (Blueprint $table) { 
            $table->id();
            $table->dateTime('fecha');
            $table->bigInteger('categoriagasto')->unsigned();    

            $table->foreign('categoriagasto')
                  ->references('id')
                  ->on('categoriasgastos')
                  ->onDelete('cascade');
            
            $table->bigInteger('subcategoriagasto')->unsigned(); 
            
            $table->foreign('subcategoriagasto')
                  ->references('id')
                  ->on('subcategoriasgastos')
                  ->onDelete('cascade');

            $table->integer('importe')->default(0); 
            $table->char('concepto', 50);
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
        Schema::dropIfExists('apuntesgastos');
    }
}
