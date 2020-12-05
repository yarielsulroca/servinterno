@if(Auth::user()->role_id == 1)
@extends('layouts.apk')
@section('title','editar-usuarios')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Adicionar Nuevo Usuario
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form action="{{ route('usuario.update',$usuario->id) }}" method="PUT">
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="name">Nombre y Apellidos :</label>
                        <div class="col-6">

                            <input type="text" class="form-control" name="name" id="name" value="{{$usuario->name}}"/>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="quantity">Direccón de Correo :</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$usuario->email}}"/>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="quantity">Contraseña Nueva :</label>
                            <input id="password" type="password" value="{{$usuario->password}}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label class="form-label">Rol que Ocuaprá: </label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option value="{{$usuario->role_id}}">[{{$usuario->roleName($usuario->role_id)->name}}]</option>
                                <option value="1">Administrador</option>
                                <option value="2">Director</option>
                                <option value="3">Controlador</option>
                                <option value="4">Ejecutor</option>

                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <input type="submit"  value="Actualizar" class="btn btn-primary">
                        <br><br>
                        <a href="{{route('usuario.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@endif