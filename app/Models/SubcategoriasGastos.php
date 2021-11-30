<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoriasGastos extends Model
{
    use HasFactory;
    protected $table = "subcategoriasgastos";

    public static function GetFindData($Data){
        $Subcategorias = SubCategoriasGastos::select('*')
                   ->where('nombresubcategorias','LIKE','%'.$Data.'%')
                   ->orWhere('tipogastomensual','LIKE','%'.$Data.'%') 
                   ->orderBy('id', 'DESC');

        return $Subcategorias;
    }
}