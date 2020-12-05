@if(Auth::user()->role_id == 1)
@extends('layouts.apk')
@section('title','crear-usuarios')
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
                <form method="post" action="{{ route('usuario.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="name">Nombre y Apellidos :</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre 1er.Apellido 2do.Apellido"/>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="quantity">Direccón de Correo :</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="usuario@dominio.com"/>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="quantity">Contraseña :</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label class="form-label">Rol que Ocuaprá: </label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option value="">[Rol]</option>
                                <option value="1">Administrador</option>
                                <option value="2">Director</option>
                                <option value="3">Controlador</option>
                                <option value="4">Ejecutor</option>

                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-archive"></i>&nbsp Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{route('usuario.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
    </div>
@endsection
@endif