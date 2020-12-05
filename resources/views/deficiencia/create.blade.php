@if(Auth::user()->role_id == 1)
@extends('layouts.apk')
@section('title','crear-deficiencia')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Adicionar Nueva Deficiencia
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
                <form method="post" action="{{ route('deficiencia.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="numero">Número :</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="Número"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="descrip">Deficiencia :</label>
                        <textarea class="form-control" id="descrip" name="descrip" rows="5" placeholder="Escriba el contenido aqui"></textarea>
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
@endif