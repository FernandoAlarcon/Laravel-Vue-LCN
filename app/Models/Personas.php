<?php

namespace App\Models;   
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory; 
    
    protected $table = "personas_lista";
   

    
    public static function GetDataUnion($data){ 
        
        $cantidad = 15;
        if ($data != '') {

            $personas = personas::select('*')
    
            ->where(static function ($query) use ($data) {

                $query->where('nombres'   , 'LIKE', "%{$data}%") 
                      ->orWhere('apellidos'    , 'LIKE', "%{$data}%")
                      ->orWhere('tipos_identificacion'  , 'LIKE', "%{$data}%") 
                      ->orWhere('identificacion'  , 'LIKE', "%{$data}%") 
                      ->orWhere('sexo'  , 'LIKE', "%{$data}%") 
                      ->orWhere('fecha_nacimiento'  , 'LIKE', "%{$data}%")  
                      ->orWhere('carrera'         , 'LIKE', "%{$data}%");
            
            })->orderBy('id', 'DESC');
             
        }else{

            $personas = personas::select('*')->orderBy('id', 'DESC');     

        }

        return $personas;
    }

     
}