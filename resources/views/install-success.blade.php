@extends('layouts.app')

@section('title')
    Success
@endsection

@section('content')

    <center style="margin-top:100px;">
        <h1 style="font-size: 150px;color:green;"><i class="icon ion-checkmark-circled"></i></h1>
        <h2>La Instalacion se Completo con Exito</h2>
        <a href="{{route('register')}}" class="btn btn-success btn-lg">Registrarse como Administrador </a>
    </center>

@endsection