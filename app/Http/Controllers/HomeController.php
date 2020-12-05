<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mascota;
use App\Persona;
use App\Veterinaria;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_mascotas= Mascota::all()->count();
        $adoptantes=Persona::where('id_rol',1)->count();
        $padrinos=Persona::where('id_rol',2)->count();
        $veterinarias=Veterinaria::all()->count();
        return view('admin/inicio',["total_mascotas"=>$total_mascotas,"adoptantes"=>$adoptantes,"padrinos"=>$padrinos,"veterinarias"=>$veterinarias]);
    }
  
    
}
