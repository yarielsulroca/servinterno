@if(Auth::user()->role_id == 1)
@extends('layouts.apk')
@section('title','usuarios')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Usuarios del Sistema</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('usuario.create') }}"> Crear nuevo Usuario</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Nombre y Apellidos</th>
                <th>Correo</th>
                <th width="20px">Rol</th>
                <th width="50px">Menú</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <th>{{ $usuario->name }}</th>
                    <th>{{ $usuario->email }}</th>
                    <td>{{$usuario->roleName($usuario->role_id)->name}}</td>
                    <th width="50px">
                        <a href="{{action('UsuarioController@edit', $usuario->id)}}"  class="btn btn-primary">
                            <i class="fa fa-edit"></i>Editar
                        </a>
                        <form action="{{action('UsuarioController@destroy', $usuario->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span>Eliminar</button>
                        </form>
                    </th>

                </tr>
            @endforeach
            </tbody>

        </table>
        {{$usuarios->links()}}
        <a href="{{route('usuario.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
    </div>
@endsection
@endif
