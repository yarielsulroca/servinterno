@extends('layouts.apk')
@section('title','home')
@section('content')

    <div class="container">
       <br><br>
        <h1 class="bg-info col-3">Bienvenido: </h1>
        <br>
        <h2 class="col-12">Sistema de Gestión para la Dirección Nacional.</h2>
        <h5 class="col-12">Grupo Servicios Internos. </h5>
        <p class="col-12">Este sistema automatizado, gestiona las Medidas tomadas como solución a Deficiencias en la Acción de Control:
            <not class="">“Auditoría de cumplimiento XIII CNCI.”</not></p>
        <br>
        <img src="{!! asset('images/fideljc.jpg') !!}">
    </div>
    @endsection


