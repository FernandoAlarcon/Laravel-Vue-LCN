<?php

namespace App\Models;   

use App\Models\CategoriasGastos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApuntesGastos extends Model
{
    use HasFactory;
    protected $with = ['CategoriasGasto', 'SubcategoriasGasto'];
    
    protected $table = "ApuntesGastos";
    protected $fillable = [
        'CategoriaGasto',
        'SubcategoriaGasto',
        'Importe',
        'Concepto'
    ];
    
    public function CategoriasGasto()
    {   
        return $this->belongsTo(CategoriasGastos::class, 'categoriagasto','id')->select(array('id', 'NombreCategorias', 'tipocategoria', 'estadocategoria'));    
    }

    public function SubcategoriasGasto()
    {
        return $this->belongsTo(SubCategoriasGastos::class, 'subcategoriagasto' ,'id')->select(array('id', 'NombreSubcategorias','tipogastomensual'));
    }

    public static function GetFindData($data){
        //$data          = $data->get('DataSend');
        $ApuntesGastos = ApuntesGastos::select('*')
                    ->where('CategoriaGasto', function ($query) use ($data) {
                        $query->where('NombreCategorias',    'LIKE', "%$data->like%");
                    }) 
                    ->orWhereHas('SubcategoriaGasto', function ($query) use ($data) {
                        $query->where('NombreSubcategorias', 'LIKE', "%$data->like%");
                    }) 
                    ->orWhere('Concepto','LIKE','%'.$data.'%')
                    ->orWhere('Importe','LIKE','%'.$data.'%')
                    ->orderBy('id', 'DESC');

        return $ApuntesGastos;
    }
}