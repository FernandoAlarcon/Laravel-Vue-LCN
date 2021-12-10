<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategoriasGastos;


class SubCategoriasController extends Controller
{
     
    public function index(Request $request)
    {   
        $mood     = $request->input('mood');

        $cantidad = $request->input('cantidad');
        $query    = trim($request->get('DataSend'));
        
        if(!isset($cantidad)){
            $cantidad = 15;
        }

        if ($query != '') {
            
            $subcategorias = SubCategoriasGastos::GetFindData($query)->paginate($cantidad);
            
        }elseif ($mood == '1') {
            $subcategorias = SubCategoriasGastos::all();
            
            return [ 'subcategorias' => $subcategorias  ];
        }
        else{
            $subcategorias = SubCategoriasGastos::orderBy('id', 'DESC')->paginate($cantidad);
        }
        return [
            'pagination' => [
                'total'         => $subcategorias->total(),
                'current_page'  => $subcategorias->currentPage(),
                'per_page'      => $subcategorias->perPage(),
                'last_page'     => $subcategorias->lastPage(),
                'from'          => $subcategorias->firstItem(),
                'to'            => $subcategorias->lastItem(),
            ],
            'subcategorias' => $subcategorias 
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombresubcategorias' => 'required',
            'tipogastomensual'=>'required', 
        ]);
 
        $Fecha      = date("Y-m-d  h:i:s");
        $subcategorias = new SubCategoriasGastos();
        $subcategorias->nombresubcategorias  = $request->input('nombresubcategorias');
        $subcategorias->tipogastomensual     = $request->input('tipogastomensual'); 
        $subcategorias->save();

        if($subcategorias){
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
        $subcategorias = SubCategoriasGastos::find($id);
        $subcategorias->nombresubcategorias  = $request->input('nombresubcategorias');
        $subcategorias->tipogastomensual     = $request->input('tipogastomensual'); 
        $subcategorias->save();
    }
    
    public function destroy($id)
    {
        $subcategorias = SubCategoriasGastos::find($id);
        $subcategorias->delete();

        return;
    }
}
