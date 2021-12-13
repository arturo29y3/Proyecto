<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distancia;
use App\Models\Movimiento;
use App\Models\Puerta;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;

class IntegradoraController extends Controller
{
    public function InsertarDistancia($id)
    {
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/inte-distancia/data/last');
       $valor=json_decode($response,true);
       $valor1=json_decode($response,true);
       $valor2=json_decode($response,true);
       $valor3=json_decode($response,true);

        Distancia::create([ 
            'created_at' =>$valor1['created_at'],
            'updated_at'=>$valor2['updated_at'],
            'distancia' =>$valor3['value'],
            'usuario_id' =>$id,
        ]);{
        return $response;
        }    
    } 
    public function InsertarMovimiento($id){
                    
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/inte-movimiento/data/last');
        $valor=json_decode($response,true);
        $valor1=json_decode($response,true);
        $valor2=json_decode($response,true);
        $valor3=json_decode($response,true);
 
         Movimiento::create([     
             'created_at' =>$valor1['created_at'],
             'updated_at'=>$valor2['updated_at'],
             'movimiento' =>$valor3['value'],
             'usuario_id' =>$id,
         ]);{
         return $response;
         }  
    }
    public function InsertarPuerta($id){
                    
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/distancia-puerta/data/last');
        $valor=json_decode($response,true);
        $valor1=json_decode($response,true);
        $valor2=json_decode($response,true);;
        $valor3=json_decode($response,true);
 
         Puerta::create([     
             'created_at' =>$valor1['created_at'],
             'updated_at'=>$valor2['updated_at'],
             'puerta' =>$valor3['value'],
             'usuario_id' =>$id,
         ]);{
         return $response;
         }  
    }
    public function InsertarDis()
    {
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/inte-distancia/data/last');
       $valor=json_decode($response,true);
       $valor1=json_decode($response,true);
       $valor2=json_decode($response,true);
       $valor3=json_decode($response,true);

        Distancia::create([ 
            'created_at' =>$valor1['created_at'],
            'updated_at'=>$valor2['updated_at'],
            'distancia' =>$valor3['value'],
            'usuario_id' =>0,
        ]);{
        return $response;
        }    
    } 
    public function InsertarMov(){
                    
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/inte-movimiento/data/last');
        $valor=json_decode($response,true);
        $valor1=json_decode($response,true);
        $valor2=json_decode($response,true);;
        $valor3=json_decode($response,true);
 
         Movimiento::create([     
             'created_at' =>$valor1['created_at'],
             'updated_at'=>$valor2['updated_at'],
             'movimiento' =>$valor3['value'],
             'usuario_id' =>0,
         ]);{
         return $response;
         }  
    }
    public function InsertarPu(){
                    
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/distancia-puerta/data/last');
        $valor=json_decode($response,true);
        $valor1=json_decode($response,true);
        $valor2=json_decode($response,true);;
        $valor3=json_decode($response,true);
 
         Puerta::create([     
             'created_at' =>$valor1['created_at'],
             'updated_at'=>$valor2['updated_at'],
             'puerta' =>$valor3['value'],
             'usuario_id' =>0,
         ]);{
         return $response;
         }  
    }

    public function mostrardis(){

        $dist=Distancia::all();
        return$dist;
    }
    public function mostrarmov(){

        $mov=Movimiento::all();
        return$mov;
    }
    public function mostrarpu(){

        $pu=Puerta::all();
        return$pu;
    }

    public function MostrarRegistroDistancia($id){
       
        $dis=Distancia::select('distancia.distancia','distancia.created_at','users.name')
        ->join('users','users.id','=','distancia.usuario_id')->where('users.id','=',$id)
        ->get();

        return $dis;       
    }
    public function MostrarRegistroMovimiento($id){
       
        $mov=Movimiento::select('movimiento.movimiento','movimiento.created_at','users.name')
        ->join('users','users.id','=','movimiento.usuario_id')->where('users.id','=',$id)
        ->get();

        return $mov;       
    }
    public function MostrarRegistroPuerta($id){
       
        $pu=Puerta::select('puerta.puerta','puerta.created_at','users.name')
        ->join('users','users.id','=','puerta.usuario_id')->where('users.id','=',$id)
        ->get();

        return $pu;       
    }
    public function eliminarDistancia($id){

        $eliDistancia=Distancia::join('users','users.id','=','distancia.usuario_id')
        ->where('users.id','=',$id)->delete();
        return $eliDistancia;
    }
    public function eliminarMovimiento($id){

        $eliMovimiento=Movimiento::join('users','users.id','=','movimiento.usuario_id')
        ->where('users.id','=',$id)->delete();
        return $eliMovimiento;
    }
    public function eliminarPuerta($id){

        $eliMovimiento=Puerta::join('users','users.id','=','puerta.usuario_id')
        ->where('users.id','=',$id)->delete();
        return $eliMovimiento;
    }

    public function eliminarDis(){

        return DB::table('distancia')->delete();
    }
    public function eliminarMov(){

        return DB::table('movimiento')->delete();

    }
    public function eliminarPu(){

        return DB::table('puerta')->delete();

    }

    public function fechasDis($fecha){

        return Distancia::where('created_at','>=',$fecha)->get();
    }
    public function fechasMov($fecha){

        return Movimiento::where('created_at','>=',$fecha)->get();
    }
    public function fechasPu($fecha){

        return Puerta::where('created_at','>=',$fecha)->get();
    }


    public function boton(){
                    
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_KJQx20U9IA8IMnchE8IieBYK7X8Z'])
        ->get('https://io.adafruit.com/api/v2/ErenJeager/feeds/led/data');

         return $response;
         
    }
    
    




}
