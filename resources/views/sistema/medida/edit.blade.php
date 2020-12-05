@extends('layouts.apk')
@section('title','edit-medida')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar Medida
            </div>
            <div class="container">
                <br>
                <form action="{{route('sistema.update',$medida->id)}}" class="" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="" class="mb-2">Meida :</label>
                    <div class="form-group">
                        <textarea name="descrip" id="descrip" class="form-control" >{{$medida->descrip}}</textarea>
                    </div>
                    <label for="" class="">Comentario :</label>
                    <textarea name="contenido" id="contenido" class="form-control" >{{$medida->contenido}}</textarea>
                    <br>
                    <label for="" class="form-group">Fecha :</label>
                    <input type="date" value="{{$medida->fecha}}" name="fecha" id="fecha">
                    <br><br><br>
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-2">
                        <div class="form-group">
                            <label class="form-label"> Controlador :</label>
                            <select class="form-control" name="controlador" id="controlador">
                                <option value="{{$medida->controlador}}">[Mostrar]</option>
                                @foreach( $usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" >
                            <label class="form-label"> Ejecutor :</label>
                            <select class="form-control" name="ejecutor" id="ejecutor">
                                <option value="{{$medida->ejecutor}}">[Mostrar]</option>
                                @foreach( $usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="" class="form-group">Estado:</label>
                        <select name="estado_id" id="estado_id" class="col-2">
                            <option value="{{$medida->estado_id}}" class="">[ Estado ]</option>
                            <option value="1">Solicitada</option>
                            <option value="2">Cumplida</option>
                            <option value="3">Incumplida</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" value="submit">Guardar</button>
                </form>
                <br>
                <a href="{{route('sistema.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
            </div>
        </div>
    </div>
    @endsection