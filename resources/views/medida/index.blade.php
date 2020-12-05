@if(Auth::user()->role_id == 1)
@extends('layouts.apk')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Medidas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('medida.create') }}"> Crear nueva Medida</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No.Def</th>
                <th>No.Med</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Controla</th>
                <th>Ejecuta</th>

                <th width="50px">Menú</th>
            </tr>
            @foreach ($medidas as $medida)
                <tr>
                    <td>{{$medida->id_def}}</td>
                    <td>{{$medida->numero}}</td>
                    <td>{{$medida->descrip}}</td>
                    <td>{{$medida->fecha}}</td>
                    <td>{{$medida->controlador}}</td>
                    <td>{{$medida->ejecutor}}</td>

                    <td>
                        Botones
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{route('home')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
    </div>

@endsection
@endif