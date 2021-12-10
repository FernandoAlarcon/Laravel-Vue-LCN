<?php

namespace App\Models;   

use App\Models\CategoriasGastos;
use App\Models\SubCategoriasGastos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApuntesGastos extends Model
{
    use HasFactory;
    //protected $with = ['CategoriasGasto', 'SubcategoriasGasto'];
    
    protected $table = "apuntesgastos";
    // protected $fillable = [
    //     'categoriagasto',
    //     'subcategoriagasto ',
    //     'importe',
    //     'concepto'
    // ];
    
    // public function CategoriasGasto()
    // {   
    //     return $this->belongsTo(CategoriasGastos::class, 'categoriagasto','id')->select(array('id', 'nombrecategorias', 'tipocategoria', 'estadocategoria'));    
    // }

    // public function SubcategoriasGasto()
    // {
    //     return $this->belongsTo(SubCategoriasGastos::class, 'subcategoriagasto ' ,'id')->select(array('id', 'nombresubcategorias','tipogastomensual'));
    // }

    public static function GetFindData($data){
        //$data          = $data->get('DataSend');
        $ApuntesGastos = ApuntesGastos::select('*')
                    ->where('categoriagasto ', function ($query) use ($data) {
                        $query->where('nombrecategorias',    'LIKE', "%$data->like%");
                    }) 
                    ->orWhereHas('subcategoriagasto ', function ($query) use ($data) {
                        $query->where('nombresubcategorias', 'LIKE', "%$data->like%");
                    }) 
                    ->orWhere('concepto','LIKE','%'.$data.'%')
                    ->orWhere('importe','LIKE','%'.$data.'%')
                    ->orderBy('id', 'DESC');

        return $ApuntesGastos;
    }

    public static function GetDataUnion($data){ 
        
        $cantidad = 15;
        if ($data != '') {

            $ApuntesGastos = ApuntesGastos::join('categoriasgastos     AS CAT', 'apuntesgastos.categoriagasto'      ,    '=', 'CAT.id')
            ->join('subcategoriasgastos  AS SUB', 'apuntesgastos.subcategoriagasto'   ,    '=', 'SUB.id')
    
            ->where(static function ($query) use ($data) {
                $query->where('CAT.nombrecategorias'   , 'LIKE', "%{$data}%") 
                      ->orWhere('CAT.tipocategoria'    , 'LIKE', "%{$data}%")
                      ->orWhere('CAT.estadocategoria'  , 'LIKE', "%{$data}%")
                      
                      ->orWhere('SUB.nombresubcategorias'  , 'LIKE', "%{$data}%")
                      ->orWhere('SUB.tipogastomensual'     , 'LIKE', "%{$data}%")
    
                      ->orWhere('apuntesgastos.importe'     , 'LIKE', "%{$data}%")
                      ->orWhere('apuntesgastos.concepto'    , 'LIKE', "%{$data}%");
            })
            ->select(
    
                'apuntesgastos.id',
                'CAT.nombrecategorias    AS NombreCategorias',
                'SUB.nombresubcategorias AS NombreSubcategorias',

                'apuntesgastos.subcategoriagasto AS categoriagasto',
                'apuntesgastos.categoriagasto    AS subcategoriagasto',

                'apuntesgastos.importe',
                'apuntesgastos.concepto',
                'apuntesgastos.fecha'
    
            )->orderBy('apuntesgastos.id', 'DESC');
             
        }else{

            $ApuntesGastos = ApuntesGastos::
            join('categoriasgastos     AS CAT', 'apuntesgastos.categoriagasto'      ,    '=', 'CAT.id')
            ->join('subcategoriasgastos  AS SUB', 'apuntesgastos.subcategoriagasto'   ,  '=', 'SUB.id')
            ->select(

                'apuntesgastos.id',
                'CAT.nombrecategorias    AS NombreCategorias',
                'SUB.nombresubcategorias AS NombreSubcategorias',

                'apuntesgastos.subcategoriagasto AS categoriagasto',
                'apuntesgastos.categoriagasto    AS subcategoriagasto',
                
                'apuntesgastos.importe',
                'apuntesgastos.concepto',
                'apuntesgastos.fecha'

            )->orderBy('apuntesgastos.id', 'DESC');     

        }



        return $ApuntesGastos;
    }

    public static function GetData(){

        $ApuntesGastos = ApuntesGastos::
                    join('categoriasgastos AS C', 'apuntesgastos.categoriagasto','=','C.id')
                    ->join('subcategoriasgastos AS S', 'apuntesgastos.subcategoriagasto ','=','S.id')

                    ->select(  
                        'apuntesgastos.importe',
                        'apuntesgastos.concepto',
                        'apuntesgastos.fecha',

                        'C.nombrecategorias    AS NombreCategorias',
                        'C.nombresubcategorias AS NombreSubcategorias',
                    )
                    ->orderBy('id', 'DESC');

            return $ApuntesGastos;
    }
}