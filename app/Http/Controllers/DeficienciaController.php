<?php

namespace App\Http\Controllers;

use App\{Deficiencia,Medida,User};
use Illuminate\Http\Request;

class DeficienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::orderBy('numero','asc')->get();
        $deficiencias = Deficiencia::orderBy('numero','asc')->paginate(5);
       return view('deficiencia.index')
           ->with('deficiencias',$deficiencias)
           ->with('medidas',$medidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('deficiencia.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deficiencia = new Deficiencia([
            'descrip' => $request->get('descrip'),
            'numero'=> $request->get('numero')
        ]);
        $deficiencia->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  $deficiencia = Deficiencia::where('id',$id)->first();
      //  return view('deficiencia.edit')->with('deficiencia',$deficiencia);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deficiencia::destroy($id);
        return redirect('/deficiencia');
    }
}
