<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Estudiante;
use App\Models\Propuesta;
use Carbon\Carbon;

class EstudianteController extends Controller
{
    public function index(){
        $estudiantes = Estudiante::all();
        return view('estudiante.indexEstudiante',compact('estudiantes'));
    

    }
    public function estadoView(){
      $files = [];
      foreach(Storage::disk('local')->files() as $file){
        
      }
    }
    
    public function store(Request $request){
      $propuesta=new Propuesta();
      $fecha = Carbon::now()->toDateString();

      if($request->isMethod('POST')){
        $file=$request->file('propuestaInput');
        $filename= $file->getClientOriginalName();
        $file->storeAs('',$filename.".".$file->extension(),'public');

        $propuesta->documento = 'app/public/'.$filename;
        $propuesta->estudiantes_rut = $request->estudiante;
        $propuesta->fecha = $fecha;
        
        $propuesta->save();
        return redirect()->route('estudiante.indexEstudiante');
      }
    }
}
