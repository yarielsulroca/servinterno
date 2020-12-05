@extends('layouts.apk')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Adicionar Medida
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
                <form method="post" action="{{ route('medida.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="name">Numero :</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="numero" placeholder="Numero"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Descripcion :</label>
                        <textarea class="form-control" id="descrip" name="descrip" rows="5" placeholder="Escriba el contenido aqui"></textarea>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="quantity">Fecha de cumplimiento:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"/>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label class="form-label"> Controlador </label>
                            <select class="form-control" name="controlador" id="controlador">
                                <option value="">[Mostrar]</option>
                                @foreach( $usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label"> Ejecutor </label>
                            <select class="form-control" name="ejecutor" id="ejecutor">
                                <option value="">[Mostrar]</option>
                                @foreach( $usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-2">
                        <label for="deficiencia" class="col-form-label">Deficiencia ID :</label>
                        <input value="{{$def_id}}" name="def_id" id="def_id" class="form-group">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Estado ID:</label>
                        <input value="{{$estado->id}}" name="estado_id" id="estado_id" class="form-group">
                    </div>
                    <br><br>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-archive"></i>&nbsp Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{route('deficiencia.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
    </div>
@endsection
