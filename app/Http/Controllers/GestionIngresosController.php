<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GestionIngresos;


class GestionIngresosController extends Controller
{
    public function index(Request $request)
    {   
        $mood     = $request->input('mood');

        $cantidad = $request->input('cantidad');
        if(!isset($cantidad)){
            $cantidad = 15;
        }

        if ($request) {
            $query      = trim($request->get('DataSend'));
            $GestionIngresos = GestionIngresos::GetFindData($query)->paginate($cantidad);

            if($query == 'All'){
                $GestionIngresos = GestionIngresos::get();
                return [
                    'gestioningresos' => $GestionIngresos
                ];
            }
        }elseif ($mood == '1') {

            $GestionIngresos = GestionIngresos::all();
            return [  'gestioningresos' => $GestionIngresos ];
            
        }else{
            $GestionIngresos = GestionIngresos::orderBy('id', 'DESC')->paginate($cantidad);
        }
        return [
            'pagination' => [
                'total'         => $GestionIngresos->total(),
                'current_page'  => $GestionIngresos->currentPage(),
                'per_page'      => $GestionIngresos->perPage(),
                'last_page'     => $GestionIngresos->lastPage(),
                'from'          => $GestionIngresos->firstItem(),
                'to'            => $GestionIngresos->lastItem(),
            ],
            'gestioningresos' => $GestionIngresos 
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_tipo_entradas' => 'required',
            'tipo_ingreso'=>'required', 
            'estado'=>'required', 
        ]);
 
        $Fecha      = date("Y-m-d  h:i:s");
        $GestionIngresos = new GestionIngresos();
        $GestionIngresos->nombre_tipo_entradas  = $request->input('nombre_tipo_entradas');
        $GestionIngresos->tipo_ingreso          = $request->input('tipo_ingreso'); 
        $GestionIngresos->estado                = $request->input('estado'); 
        $GestionIngresos->save();

        if($GestionIngresos){
             $resultado = 'Enviado';
        }else{
             $resultado = 'No enviado';
        }
 
        return  [ 
            'Data' => $resultado
        ];
    }

    
    public function update(Request $request, $id)
    {
        $GestionIngresos = GestionIngresos::find($id);
        $GestionIngresos->nombre_tipo_entradas  = $request->input('nombre_tipo_entradas');
        $GestionIngresos->tipo_ingreso          = $request->input('tipo_ingreso'); 
        $GestionIngresos->estado                = $request->input('estado'); 
        $GestionIngresos->save();
    }
    
    public function destroy($id)
    {
        $GestionIngresos = GestionIngresos::find($id);
        $GestionIngresos->delete();

        return;
    }
}
