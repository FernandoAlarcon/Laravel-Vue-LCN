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
        $query         = trim($request->get('DataSend'));
        if ($query != '') {
            
            if($query == 'ALL-DATA'){

                // $ApuntesGastos = ApuntesGastos::select('*', 
                //         DB::raw("DATE_FORMAT(fecha,'%Y') as fecha_year"),
                //         DB::raw("DATE_FORMAT(fecha,'%M') as mes_year"))
                //     ->orderBy('fecha_year', 'DESC')
                //     ->get()
                //     ->groupBy('fecha_year');    
                
                $Categorias = ApuntesGastos::select('*')
                    ->orderBy('categoriagasto', 'DESC')
                    ->get()
                    ->keyBy('categoriagasto', 'DESC');

                    
                $ApuntesGastos = ApuntesGastos::select('*', 
                        DB::raw("DATE_FORMAT(fecha,'%Y') as fecha_year"),
                        DB::raw("DATE_FORMAT(fecha,'%M') as mes_year"))
                        ->get()
                        ->keyBy('fecha_year', 'DESC');


                    // , 
                    // DB::raw("DATE_FORMAT(fecha,'%Y') as fecha_year"),
                    // DB::raw("DATE_FORMAT(fecha,'%M') as mes_year"),
                    // DB::raw("categoriagasto as Categorias ")
                    

                $Years = ApuntesGastos::select('id','fecha', DB::raw("DATE_FORMAT(fecha,'%Y') as fecha_year"))
                    ->orderBy('fecha_year', 'DESC')                
                    ->distinct()  
                    ->get()
                    ->keyBy('fecha_year'); 

                return [
                    'Categorias' => $Categorias,
                    'apuntes' => $ApuntesGastos,
                    'edades'  => $Years

                ];
            }else{
                $ApuntesGastos = ApuntesGastos::GetFindData($request)->paginate(5);
            }
        }else{
            $ApuntesGastos = ApuntesGastos::orderBy('fecha', 'DESC')->paginate(5);            
        } 
        
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'CategoriaGasto'    => 'required',
            'SubcategoriaGasto' => 'required',
            'Importe'           => 'required',
            'Concepto'          => 'required'
        ]);
 
        $Fecha      = date("Y-m-d  h:i:s");
        $ApuntesGastos = new ApuntesGastos();
        $ApuntesGastos->CategoriaGasto    = $request->input('CategoriaGasto');
        $ApuntesGastos->SubcategoriaGasto = $request->input('SubcategoriaGasto');
        $ApuntesGastos->Importe           = $request->input('Importe');
        $ApuntesGastos->Concepto          = $request->input('Concepto');
        $ApuntesGastos->Fecha             = $Fecha;
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
        $ApuntesGastos->CategoriaGasto    = $request->input('CategoriaGasto');
        $ApuntesGastos->SubcategoriaGasto = $request->input('SubcategoriaGasto');
        $ApuntesGastos->Importe           = $request->input('Importe');
        $ApuntesGastos->Concepto          = $request->input('Concepto');
        $ApuntesGastos->save();
    }

    public function destroy($id)
    {
        $ApuntesGastos = ApuntesGastos::find($id);
        $ApuntesGastos->delete();

        return;
    }

}