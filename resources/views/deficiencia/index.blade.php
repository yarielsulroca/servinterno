@extends('layouts.apk')
@section('title','Listado')
@section('content')
    <!-- If de validacion de rol-->
@if(Auth::user()->role_id == 1)
    <br><br>
    <div class="container">
        <div class="form-group">
            <div class="pull-right">
                <a href="{{route('deficiencia.create')}}" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i>
                    Nueva Deficiencia
                </a>
            </div>
            <!-- Tabla Deficiencias -->
            @foreach($deficiencias as $deficiencia)
                @if(\App\Deficiencia::find($deficiencia->id))

                    <div class="row">
                        <div class="col-2">No :</div>
                        <div class="col-8">Deficiencia :</div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-1">{{$deficiencia->numero}}</div>
                        <div class="col-10">{{$deficiencia->descrip}}</div>
                        <div class="col-1">
                            <form action="{{action('DeficienciaController@destroy',$deficiencia->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span>Eliminar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <!-- tabla de medidas -->
                    <table class=" table table-responsive" border="1">
                        <thead class="thead-dark">
                        <tr>
                            <th>No&nbsp&nbsp</th>
                            <th>Medida</th>
                            <th>Controla</th>
                            <th>Ejecuta</th>
                            <th>Fecha</th>
                            <th></th>
                            <div class="pull-left">
                                <a href="{{route('medida.create',$deficiencia->id)}}" class="btn btn-outline-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Nueva Medida
                                </a>
                            </div>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($medidas as $medida)
                            @if($deficiencia->id == $medida->def_id)
                                <tr>
                                    <th>{{$medida->numero}}</th>
                                    <th >{{$medida->descrip}}</th>
                                    <th >{{\App\User::idName($medida->controlador)}}</th>
                                    <th >{{\App\User::idName($medida->ejecutor)}}</th>
                                    <th >{{$medida->fecha}}</th>
                                    <th class="col-1">
                                        <form action="{{action('MedidaController@destroy',$medida->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span>Eliminar</button>
                                        </form>
                                    </th>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
            @endif
            <!-- Fin tabla de medidas -->
                <br><br>
        @endforeach
        <!-- Tabla Deficiencias -->
            <br>
            <a href="{{route('deficiencia.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
            <br>
        </div>

        {{$deficiencias->links()}}
    </div>

@else (echo "usted no tiene privilegios para este contenido")
@endif
    <!-- fin If de validacion de rol-->
    @endsection