<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasGastos;


class CategoriasController extends Controller
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
            $categorias = CategoriasGastos::GetFindData($query)->paginate($cantidad);

           
        }elseif ($mood == 1) {
         
            $categorias = CategoriasGastos::all();
            return [ 'categorias' => $categorias  ];
            
        }else{
            $categorias = CategoriasGastos::orderBy('id', 'DESC')->paginate($cantidad);
        }
        return [
            'pagination' => [
                'total'         => $categorias->total(),
                'current_page'  => $categorias->currentPage(),
                'per_page'      => $categorias->perPage(),
                'last_page'     => $categorias->lastPage(),
                'from'          => $categorias->firstItem(),
                'to'            => $categorias->lastItem(),
            ],
            'categorias' => $categorias 
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombrecategorias' => 'required',
            'tipocategoria'    => 'required',
            'estadocategoria'  => 'required'
        ]);
 
        $Fecha      = date("Y-m-d  h:i:s");
        $categorias = new CategoriasGastos();
        $categorias->nombrecategorias  = $request->input('nombrecategorias');
        $categorias->tipocategoria     = $request->input('tipocategoria');
        $categorias->estadocategoria   = $request->input('estadocategoria');
        $categorias->save();

        if($categorias){
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
        $categorias = CategoriasGastos::find($id);
        $categorias->nombrecategorias  = $request->input('nombrecategorias');
        $categorias->tipocategoria     = $request->input('tipocategoria');
        $categorias->estadocategoria   = $request->input('estadocategoria');
        $categorias->save();
    }

    public function destroy($id)
    {
        $categorias = CategoriasGastos::find($id);
        $categorias->delete();

        return;
    }
}
