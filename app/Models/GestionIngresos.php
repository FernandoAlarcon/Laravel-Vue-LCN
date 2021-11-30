<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionIngresos extends Model
{
    use HasFactory;
    protected $table = "gestioningresos";
    
    public static function GetFindData($Data){
        $GestionIngreso = GestionIngresos::select('*')
                   ->where('nombre_tipo_entradas','LIKE','%'.$Data.'%')
                   ->orWhere('estado','LIKE','%'.$Data.'%')
                   ->orWhere('tipo_ingreso','LIKE','%'.$Data.'%')
                   ->orderBy('id', 'DESC');

        return $GestionIngreso;
    }
}