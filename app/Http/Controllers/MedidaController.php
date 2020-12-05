<?php

namespace App\Http\Controllers;
use App\{
    Estado, Medida, Deficiencia, User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::all();
        return redirect('deficiencia.index')->with('medidas',$medidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $usuarios = User::orderBy('name','asc')->get();
        $def_id = $id;
        $estado = Estado::find(1);
        return view('medida.create')->with('usuarios',$usuarios)->with('def_id',$def_id)->with('estado',$estado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$medida = new Medida([
        'numero'=>$request->get('numero'),
        'descrip'=>$request->get('descrip'),
        'fecha'=>$request->get('fecha'),
        'controlador'=>$request->get('controlador'),
        'ejecutor'=>$request->get('ejecutor'),
        'estado_id'=>$request->get('estado_id'),
        'def_id'=>$request->get('def_id')
        ]);
        $medida->save();
        return redirect('/deficiencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medida::destroy($id);
        return redirect('/deficiencia');
    }
}
