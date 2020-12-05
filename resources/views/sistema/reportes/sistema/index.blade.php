@extends('layouts.apk')
@section('title','reportes')
@section('content')
    <br>
    <div class="container">
        <label for="fecha_sistema" class="label-primary">Fecha :</label>
        <a class="btn-success" id="clook" >&nbsp <i class="fa fa-calendar-check"></i>&nbsp &nbsp {{$system_date= date("Y-m-d")}}</a>
        <br><br>
        @if (Auth::user()->role_id == 2)
            <table class="table-responsive" border="0">
                <thead class="">
                <tr>
                    <th>&nbsp Solicitadas &nbsp </th>
                    <th>&nbsp Cumplidas &nbsp </th>
                    <th>&nbsp Incumplidas &nbsp </th>
                </tr>
                </thead>
                <tbody class="">
                <tr>
                    <th class="table-warning">{{$solicitadas}}</th>
                    <th class="table-success">{{$cumplidas}}</th>
                    <th class="table-danger">{{$incumplidas}}</th>
                </tr>
                </tbody>
            </table>
        @endif
        <br>
        <div class="form-group">
            @foreach($datos as $dato)
               @if(Auth::user()->name == \App\User::idName($dato->controlador)
                or Auth::user()->name == \App\User::idName($dato->ejecutor)
                 or Auth::user()->role_id == 2)
                <div class="row">
                    <div class="col-1 bg-colorNo">No :</div>
                    <div class="col-2 bg-colorDef">Deficiencia :</div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-1">{{$dato->munero_def}}</div>
                    <div class="col-10">{{$dato->deficiencia}}</div>
                </div>
                <br>
                <table class="table-responsive" border="1">
                    <thead class="bg-colorTable">
                    <tr>
                        <th>No&nbsp&nbsp</th>
                        <th>Medida</th>
                        <th>Controla</th>
                        <th>Ejecuta</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <!-- Rol Directivo-->
                        @if(Auth::user()->role_id == 2)
                            <th>Comentario</th>
                            <th></th>
                        @endif
                        <!-- Fin rol Directivo-->
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>{{$dato->numero}}</th>
                        <th >{{$dato->medida}}</th>
                        <th >{{\App\User::idName($dato->controlador)}}</th>
                        <th >{{\App\User::idName($dato->ejecutor)}}</th>
                        <!-- Para Colorear fechas segun cercania a la fecha cumplida-->
                        @if($system_date > $dato->fecha)
                            <th class="table-danger">{{$dato->fecha}}</th>

                        @elseif($system_date == $dato->fecha)
                            <th class="table-warning">{{$dato->fecha}}</th>

                        @else
                            <th class="table-success">{{$dato->fecha}}</th>
                        @endif
                    <!-- Para Colorear fechas segun cercania a la fecha cumplida-->
                        <!-- para colorear segun el estado -->
                        @if($dato->tipo == "solicitada" )
                            <th class="table-warning">Solicitada</th>
                        @elseif($dato->tipo == "cumplida")
                            <th class="table-success">Cumplida</th>
                        @else
                            <th class="table-danger">Incumplida</th>
                        @endif
                    <!-- Fin para colorear segun el estado-->
                        <!-- Rol Directivo-->
                        @if(Auth::user()->role_id == 2)
                            <th class="">{{$dato->contenido}}</th>
                            <th class="">
                                <a href="{{route('sistema.edit',$dato->med_id)}}" class="btn btn-primary">Editar</a>
                            </th>
                    @endif
                    <!-- Fin rol Directivo-->
                    </tr>
                    </tbody>
                </table>
                <br>
               @endif
            @endforeach
            <br>
            <a href="{{route('sistema.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
            <br>
        </div>

        {{$datos->links()}}
    </div>
    @endsection