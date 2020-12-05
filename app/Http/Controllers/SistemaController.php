<?php

namespace App\Http\Controllers;
use App\Http\Servicios\SistemaServicio;
use Illuminate\Http\Request;
use App\{Medida,User,Deficiencia};
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class SistemaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
            //MEDIDAS
           $medidas = Medida::orderBy('fecha','asc')->get();
           //DEFICIENCIAS
           $deficiencias = Deficiencia::orderBy('numero','asc')->paginate(10);
           //Para contar la insidendencia del estado de la medida.
           $solicitadas=count(User::join('medidas','medidas.ejecutor','=','users.id')->where('estado_id','1')->get());
           $cumplidas=count(User::join('medidas','medidas.ejecutor','=','users.id')->where('estado_id','2')->get());
           $incumplidas=count(User::join('medidas','medidas.ejecutor','=','users.id')->where('estado_id','3')->get());

           return view('sistema.index')
               ->with('deficiencias',$deficiencias)
               ->with('medidas',$medidas)
               ->with('solicitadas',$solicitadas)
               ->with('cumplidas',$cumplidas)
               ->with('incumplidas',$incumplidas);

    }
    public function edit($id){
        $medida=Medida::find($id);
        $usuarios=User::all();
        return view('sistema.medida.edit')->with('medida',$medida)->with('usuarios',$usuarios);
    }
    public function update(Request $request, Medida $medida){

       $medida->update($request->all());
       $medida->save();
       $request->session()->flash('status', '!Medida Editada Satisfactoriamente!');
      return redirect('sistema');
    }

}
