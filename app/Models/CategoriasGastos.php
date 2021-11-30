<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasGastos extends Model
{
    use HasFactory;
    protected $table = "CategoriasGastos";

    public static function GetFindData($Data){
        $Categorias = CategoriasGastos::select('*')
                        ->where('nombrecategorias'  ,'LIKE','%'.$Data.'%')
                        ->orWhere('tipocategoria'   ,'LIKE','%'.$Data.'%')
                        ->orWhere('estadocategoria' ,'LIKE','%'.$Data.'%')
                        ->orderBy('id', 'DESC');

        return $Categorias;
    }
}