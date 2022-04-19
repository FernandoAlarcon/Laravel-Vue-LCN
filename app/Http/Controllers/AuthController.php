<?php

namespace App\Http\Controllers;
use App\Models\CategoriasGastos;
use App\Models\SubCategoriasGastos;
use App\Models\Personas; 

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index(Request $request)
    {   
        $mood     = $request->input('mood');
        $cantidad = $request->input('cantidad');
        if(!isset($cantidad)){
            $cantidad = 15;
        }
        
        if ( $mood == '1' ) {
            
            $data     = trim($request->get('data'));
            $personas = personas::GetDataUnion($data)->paginate($cantidad);                     
            
            return [
                'pagination' => [
                    'total'         => $personas->total(),
                    'current_page'  => $personas->currentPage(),
                    'per_page'      => $personas->perPage(),
                    'last_page'     => $personas->lastPage(),
                    'from'          => $personas->firstItem(),
                    'to'            => $personas->lastItem(),
                ],
                'apuntes' => $personas 
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
        $personas = new personas();
        $personas->categoriagasto    = $request->input('categoriagasto');
        $personas->subcategoriagasto = $request->input('subcategoriagasto');
        $personas->importe           = $request->input('importe');
        $personas->concepto          = $request->input('concepto');
        $personas->fecha             = $fecha;
        $personas->save();

        if($personas){
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
        $personas = personas::find($id);
        $personas->categoriagasto    = $request->input('categoriagasto');
        $personas->subcategoriagasto = $request->input('subcategoriagasto');
        $personas->importe           = $request->input('importe');
        $personas->concepto          = $request->input('concepto');
        $personas->save();
    }

    public function destroy($id)
    {
        $personas = personas::find($id);
        $personas->delete();

        return;
    }

}