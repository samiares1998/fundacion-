<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Mascota;
use App\Persona;
use App\Veterinaria;
use App\Historias_clinica;
use App\Tipo_vacunas;
use App\Tipo_padecimientos;
use App\Padecimientos;
use App\Vacuna;
use Illuminate\Support\Facades\DB;
class GestionMascotas extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mascotas()
    {
        $mascotas = Mascota::orderBy('id','DESC')->paginate(5);
        $adoptantes = Persona::all();
        $veterinarias = Veterinaria::all();
        return view('admin.addMascota',["mascotas"=>$mascotas,"adoptantes"=>$adoptantes,"veterinarias"=>$veterinarias]);
    }
    public function addMascota(Request $request){

        $mascota = new Mascota;
        $mascota->nombre = $request->nombre;
            $mascota->edad = $request->edad;
            $mascota->especie = $request->especie;
            $mascota->raza = $request->raza;
            if($request->adoptante!="0"){
                $mascota->adoptante_idadoptante = $request->adoptante;
            }
            if($request->veterinaria!="0"){
                $mascota->id_veterinaria = $request->veterinaria;
            }
         
            $mascota->save();
            return redirect()->route('mascotas');
          
    
        
    }
    public function editMascota(Request $request,$id){

        $mascota = Mascota::find($id);
        $mascota->nombre = $request->nombre;
            $mascota->edad = $request->edad;
            $mascota->especie = $request->especie;
            $mascota->raza = $request->raza;
            if($request->adoptante!="0"){
                $mascota->adoptante_idadoptante = $request->adoptante;
            }
            if($request->veterinaria!="0"){
                $mascota->id_veterinaria = $request->veterinaria;
            }
            $mascota->save();
            return redirect()->route('mascotas');
          
    
        
    }
    public function deleteMascotas($id){
    try{
        $mascota= Mascota::destroy($id);
        $data = [
            "status" => "200",
            "respuestas" => $mascota,
          
        ];
        return response()->json($data);
    }catch(\Exception $e){
        $data = [
            "status" => "500",
            "respuestas" => $e,
          
        ];
        return response()->json($data);
    }
    }
    //-----------------------------------
    public function adoptantes()
    {
        $adoptantes = Persona::orderBy('id','DESC')->where('id_rol',1)->paginate(5);
       
        return view('admin.adoptantes',["adoptantes"=>$adoptantes]);
    }
    public function addAdoptante(Request $request){

        $a = new adoptante;
        $a->nombres = $request->nombres;
            $a->documento = $request->documento;
            $a->estado = $request->estado;
            $a->ingreso = $request->ingreso;
            $a->genero = $request->genero;
            $a->direccion = $request->direccion;
            $a->telefono = $request->telefono;
            $a->fecha_nacimiento = $request->fecha;
            $a->id_rol = 1;
         
            $a->save();
            return redirect()->route('adoptantes');
          
    
        
    }
    public function editAdoptante(Request $request,$id){

        $a = Persona::find($id);
        $a->nombres = $request->nombres;
        $a->documento = $request->documento;
        $a->estado = $request->estado;
        $a->ingreso = $request->ingreso;
        $a->genero = $request->genero;
        $a->direccion = $request->direccion;
        $a->telefono = $request->telefono;
        $a->fecha_nacimiento = $request->fecha;
       
     
        $a->save();
        return redirect()->route('adoptantes');
          
    
        
    }
      //-----------------------------------
      public function padrinos()
      {
          $adoptantes = Persona::orderBy('id','DESC')->where('id_rol',2)->paginate(5);
         
          return view('admin.padrinos',["adoptantes"=>$adoptantes]);
      }
      public function addpadrinos(Request $request){
  
          $a = new Persona;
          $a->nombres = $request->nombres;
              $a->documento = $request->documento;
              $a->estado = $request->estado;
              $a->ingreso = $request->ingreso;
              $a->genero = $request->genero;
              $a->direccion = $request->direccion;
              $a->telefono = $request->telefono;
              $a->fecha_nacimiento = $request->fecha;
              $a->id_rol = 2;
           
              $a->save();
              return redirect()->route('adoptantes');
            
      
          
      }
      public function deletePersona($id){
        try{
            $mascota= Persona::destroy($id);
            $data = [
                "status" => "200",
                "respuestas" => $mascota,
              
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                "status" => "500",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }
        }
      //-----------------------------------------------
      public function veterinarias()
      {
          $veterinarias = Veterinaria::orderBy('id','DESC')->paginate(5);
         
          return view('admin.veterinarias',["veterinarias"=>$veterinarias]);
      }
      public function deleteVeterinaria($id){
        try{
            $mascota= Veterinaria::destroy($id);
            $data = [
                "status" => "200",
                "respuestas" => $mascota,
              
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                "status" => "500",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }
        }
      public function addveterinarias(Request $request){
  
          $a = new Veterinaria;
          $a->nombre = $request->nombre;
             
              $a->direccion = $request->direccion;
              $a->telefono = $request->telefono;
           
              $a->save();
              return redirect()->route('veterinarias');
            
      
          
      }
      public function editveterinarias(Request $request,$id){
  
          $a = Veterinaria::find($id);
          $a->nombre = $request->nombre;
             
          $a->direccion = $request->direccion;
          $a->telefono = $request->telefono;
         
       
          $a->save();
          return redirect()->route('veterinarias');
            
      
          
      }
      //---------------------------------
      public function historial($id){

        $id=decrypt($id);
        
        $mascota = Mascota::find($id);
        $historia = Historias_clinica::where('id_mascota',$id)->get();
 
        return view('admin.historial',["mascota"=>$mascota,"historia"=>$historia]);
        
    }

    public function nueva_historia($id){

        $id=decrypt($id);

        $historia = new Historias_clinica;
        $historia->id_mascota=$id;
        $historia->save();
    
        return redirect()->route('editar_historia',$historia->id);
       
    }


    public function editar_historia($id){
        $historia = Historias_clinica::find($id);
        $mascota = Mascota::find($historia->id_mascota);
        $vacunas = Tipo_vacunas::all();
        $padecimientos = Tipo_padecimientos::all();
        $vacuna_historia=Vacuna::where('id_historia_clinica',$id)->get();
        $padecimiento_historia=Padecimientos::where('id_historia_clinica',$id)->get();
        return view('admin.nueva_historia',["mascota"=>$mascota,"vacunas"=>$vacunas,"padecimientos"=>$padecimientos,"historia"=>$historia,"vacuna_historia"=>$vacuna_historia,"padecimiento_historia"=>$padecimiento_historia]);
        
    }
    public function registrar(Request $request,$id){
        try {
        $p = new Padecimientos;
        $p->medicina = $request->medicina;
        $p->dosis = $request->dosis;
        $p->nombre = $request->nombrePadecimiento;
        $p->fecha_inicio = $request->inicio;
        $p->fecha_fin = $request->fin;
        $p->id_historia_clinica = $id;
        $p->id_tipo_padecimiento = $request->padecimiento;
        $p->save();

        $padecimiento_historia=Padecimientos::where('id_historia_clinica',$id)->get();
        $data = [
            "status" => "200",
            "padecimientos" => $padecimiento_historia,
          
        ];
        return response()->json($data);
    }catch(\Exception $e){
            $data = [
                "status" => "200",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }
    }
    public function registrarVacunas(Request $request,$id){
        try {
        $v = new Vacuna;
        $v->nombre = $request->nombreV;
     
        $v->fecha = $request->fecha;
        $v->id_tipo_vacuna = $request->vacuna;
        $v->id_historia_clinica = $id;
        $v->save();
        $vacuna_historia=Vacuna::where('id_historia_clinica',$id)->get();

        $data = [
            "status" => "200",
            "vacunas" => $vacuna_historia,
          
        ];
        return response()->json($data);
    }catch(\Exception $e){
            $data = [
                "status" => "200",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }
    }
   
}
