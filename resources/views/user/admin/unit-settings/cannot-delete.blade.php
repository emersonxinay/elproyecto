@extends('layouts.app')

@section('title')
    Cannot delete Unit
@endsection

@section('content')
    <div class="card-box">
        <center>
            <h1 class="text-danger" style="font-size: 75px;"><i class="fa fa-info"></i></h1>
            <p> <span class="text-danger" style="font-size: 25px">No se puede Borrar <b>{{$unit->unit}}</b></span>
                <br>
                Coz, {{$unit->unit}} Utilizar en la tabla de Productos. Tienes que borrar primero los Productos.
            </p>
            <a href="{{url('/all-unit')}}" class="btn btn-success">Volver a toda la Unidad</a>
        </center>

    </div>
@endsection