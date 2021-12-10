<?php

namespace App\Http\Controllers;
use App\Models\CategoriasGastos;
use App\Models\SubCategoriasGastos;
use App\Models\ApuntesGastos; 

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ApuntesGastosController extends Controller
{
    public function index(Request $request)
    {   
        $mood     = $request->input('mood');
        $cantidad = $request->input('cantidad');
        if(!isset($cantidad)){
            $cantidad = 15;
        }
        
        if ( $mood == '1' ) {
            
            $data         = trim($request->get('data'));
            $ApuntesGastos = ApuntesGastos::GetDataUnion($data)->paginate($cantidad);                     
            
            return [
                'pagination' => [
                    'total'         => $ApuntesGastos->total(),
                    'current_page'  => $ApuntesGastos->currentPage(),
                    'per_page'      => $ApuntesGastos->perPage(),
                    'last_page'     => $ApuntesGastos->lastPage(),
                    'from'          => $ApuntesGastos->firstItem(),
                    'to'            => $ApuntesGastos->lastItem(),
                ],
                'apuntes' => $ApuntesGastos 
            ];
        }
        

            
        
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'categoriagasto'    => 'required',
            'subcategoriagasto' => 'required',
            'importe'           => 'required',
            'concepto'          => 'required'
        ]);
 
        $fecha      = date("Y-m-d  h:i:s");
        $ApuntesGastos = new ApuntesGastos();
        $ApuntesGastos->categoriagasto    = $request->input('categoriagasto');
        $ApuntesGastos->subcategoriagasto = $request->input('subcategoriagasto');
        $ApuntesGastos->importe           = $request->input('importe');
        $ApuntesGastos->concepto          = $request->input('concepto');
        $ApuntesGastos->fecha             = $fecha;
        $ApuntesGastos->save();

        if($ApuntesGastos){
             $resultado = 'Enviado';
        }else{
             $resultado = 'No enviado';
        }
 
        return  [ 
             'Data' => '$resultado'
        ];
    }

    public function update(Request $request, $id)
    {
        $ApuntesGastos = ApuntesGastos::find($id);
        $ApuntesGastos->categoriagasto    = $request->input('categoriagasto');
        $ApuntesGastos->subcategoriagasto = $request->input('subcategoriagasto');
        $ApuntesGastos->importe           = $request->input('importe');
        $ApuntesGastos->concepto          = $request->input('concepto');
        $ApuntesGastos->save();
    }

    public function destroy($id)
    {
        $ApuntesGastos = ApuntesGastos::find($id);
        $ApuntesGastos->delete();

        return;
    }

}