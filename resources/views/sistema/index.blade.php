@extends('layouts.apk')
@section('title','plan/medidas')
@section('content')
    <!-- filtrar rold != admin -->
    <br><br>
    <div class="container">
        <label for="fecha_sistema" class="label-primary">Fecha :</label>
        <a class="btn-success" id="clook" >&nbsp <i class="fa fa-calendar-check"></i>&nbsp &nbsp {{$system_date= date("Y-m-d")}}</a>
        <br>
        <label for="filtrar" class="col-12">
            Filtrar :<input type="text" class="col-9 nota" value="Debe seleccionar año y mes para activar botón [Aplicar] " disabled="" id="nota" name="nota" onclick="validar()">
        </label>
        <br>

        <form action="{{route('reporte.index')}}" class="" id="form-filtro-users" name="form-filtro-users" method="GET">
            @csrf
            @method('GET')
            <select name="mes" id="mes" class="col-2" onclick="validar()">
                <option value="">[Mes]</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Novienbre</option>
                <option value="12">Diciembre</option>
            </select>

            <select name="anno" id="anno" class="col-2" onclick="validar()">
                <option value="">[Año]</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="">....</option>
            </select>
            <br><br>
            <button class="btn btn-outline-primary" value="submit" id="bt-aplicar" name="bt-aplicar" disabled="disabled">
                Aplicar
            </button>
            <br><br>
            <!-- tabla de estados -->
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
            <!--FIN  tabla de estados -->
        </form>
        @if(Auth::user()->role_id == 1)
            <form action="" class=""></form>
            @endif
        <!-- Mostrar Alerta de nueva medida editada -->
        @if(session()->has('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif
        <div class="container">
            <div class="form-group">
                <!-- Tabla Deficiencias -->
                @foreach($deficiencias as $deficiencia)
                    @if(\App\Deficiencia::find($deficiencia->id))

                        <div class="row">
                            <div class="col-1 bg-colorNo">No :</div>
                            <div class="col-2 bg-colorDef">Deficiencia :</div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-1">{{$deficiencia->numero}}</div>
                            <div class="col-10">{{$deficiencia->descrip}}</div>
                        </div>
                        <br>
                        <!-- tabla de medidas -->
                        <table class=" table table-responsive" border="1">
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
                            @foreach($medidas as $medida)
                            @if(Auth::user()->name == \App\User::idName($medida->controlador)
                                or Auth::user()->name == \App\User::idName($medida->ejecutor)
                                or Auth::user()->role_id == 2)
                                @if($deficiencia->id == $medida->def_id)
                                    <tr>
                                        <th>{{$medida->numero}}</th>
                                        <th >{{$medida->descrip}}</th>
                                        <th >{{\App\User::idName($medida->controlador)}}</th>
                                        <th >{{\App\User::idName($medida->ejecutor)}}</th>
                                  <!-- Para Colorear fechas segun cercania a la fecha cumplida-->
                                        @if($system_date > $medida->fecha)
                                        <th class="table-danger">{{$medida->fecha}}</th>

                                        @elseif($system_date == $medida->fecha)
                                        <th class="table-warning">{{$medida->fecha}}</th>

                                        @else
                                        <th class="table-success">{{$medida->fecha}}</th>
                                        @endif
                                   <!-- Para Colorear fechas segun cercania a la fecha cumplida-->
                                <!-- para colorear segun el estado -->
                                        @if($medida->estado_id == 1 )
                                            <th class="table-warning">Solicitada</th>
                                        @elseif($medida->estado_id == 2)
                                            <th class="table-success">Cumplida</th>
                                        @else
                                            <th class="table-danger">Incumplida</th>
                                        @endif
                                 <!-- Fin para colorear segun el estado-->
                                        <!-- Rol Directivo-->
                                        @if(Auth::user()->role_id == 2)
                                            <th class="">{{$medida->contenido}}</th>
                                            <th class="">
                                                <a href="{{route('sistema.edit',$medida->id)}}" class="btn btn-primary">Editar</a>
                                            </th>
                                            @endif
                                        <!-- Fin rol Directivo-->
                                    </tr>
                                @endif
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
                <a href="{{route('sistema.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>&nbspAtras</a>
                <br>
            </div>

            {{$deficiencias->links()}}
        </div>
    </div>
    <script>
      function validar() {
          var anno = document.getElementById("anno");
          var  mes = document.getElementById("mes");
          var  nota = document.getElementById("nota")
          if(anno.value != "" && mes.value != "")
          {
              document.getElementById("bt-aplicar").disabled="";
              document.getElementById("nota").disabled="disabled"
          }
          else {
              document.getElementById("bt-aplicar").disabled="disabled";
              document.getElementById("nota").disabled=""
          }
      }
    </script>
@endsection