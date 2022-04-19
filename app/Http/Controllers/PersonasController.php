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
                'personas' => $personas 
            ];
        
        

            
        
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombres'               => 'required',
            'apellidos'             => 'required',
            'tipos_identificacion'  => 'required',
            'identificacion'        => 'required',
            'sexo'                  => 'required',
            'fecha_nacimiento'      => 'required',
            'carrera'               => 'required',
        ]);
  
        $personas = new personas();
        $personas->nombres    = $request->input('nombres');
        $personas->apellidos  = $request->input('apellidos');
        
        $personas->tipos_identificacion    = $request->input('tipos_identificacion');
        $personas->identificacion          = $request->input('identificacion');
        $personas->sexo                    = $request->input('sexo');
        $personas->fecha_nacimiento        = $request->input('fecha_nacimiento');
        $personas->carrera                 = $request->input('carrera');
        $personas->save();

        if($personas){
             $resultado = 'Enviado';
        }else{
             $resultado = 'No enviado';
        }
 
        return  [ 
             'Data' =>  $resultado
        ];
    }

    public function update(Request $request, $id)
    {
        $personas = personas::find($id);
        $personas->nombres    = $request->input('nombres');
        $personas->apellidos  = $request->input('apellidos');
        
        $personas->tipos_identificacion    = $request->input('tipos_identificacion');
        $personas->identificacion          = $request->input('identificacion');
        $personas->sexo                    = $request->input('sexo');
        $personas->fecha_nacimiento        = $request->input('fecha_nacimiento');
        $personas->carrera                 = $request->input('carrera');
        $personas->save();
    }

    public function destroy($id)
    {
        $personas = personas::find($id);
        $personas->delete();

        return;
    }

}