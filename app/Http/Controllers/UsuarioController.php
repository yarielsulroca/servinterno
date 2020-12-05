<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= User::orderBy('name','asc')->paginate(10);
        //$usuarios= User::all();
        return view('users.index')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Role::all();
        return view('users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $usuario= new User([
       'name' => $request->get('name'),
          'email'=> $request->get('email'),
          'password'=> bcrypt($request->get('password')),
          'role_id'=> $request->get('role_id')
        ]);
      $usuario->save();
      //$usuario->assignRole( \Spatie\Permission\Models\Role::find($request->get('role_id') ) );
      return redirect('/usuario');
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
        $usuario= User::find($id);
        return view('users.edit')->with('usuario',$usuario);
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
        User::find($id)->update([
            'name'=> $request->get('name'),
            'email'=> $request->get('emial'),
            'password'=> bcrypt($request->get('password')),
            'role_id'=> $request->get('role_id')
        ]);
        $usuario= User::find($id);
        $usuario->save();
        return redirect('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/usuario');
    }
}
