@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="card-box">
        <center>
            <div class="row">
                <img src="{{auth()->user()->image ? auth()->user()->image : 'img_assets/default-thumbnail.jpg'}}"
                     class="img-responsive img-circle" width="250px" alt="">
                <h3>{{auth()->user()->name}}</h3>
                <p>Rol : <b> @if(auth()->user()->role ==1) Administrador @elseif(auth()->user()->role ==2) Gerente del Restaurante @elseif(auth()->user()->role ==3) Cocinero @else Camarero @endif</b>
                    <br>
                    Registro : {{auth()->user()->created_at->format('d-M-Y')}}
                    <br>
                    @if(auth()->user()->role != 1)
                        Telefono : {{auth()->user()->employee->phone}} <br>
                        Direccion : {{auth()->user()->employee->address}}
                    @endif
                </p>
            </div>
        </center>
    </div>

@endsection