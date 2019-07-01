@extends('layouts.app')

@section('title')
     Dish Price - {{$dish->dish}}
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-dish')}}" class="btn btn-default waves-effect">Todos los Platos <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Editar Platos </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Plato
                </li>
                <li class="active">
                    Editar Platos
                </li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="">
            <a href="{{url('/edit-dish/'.$dish->id)}}"  aria-expanded="true">
                <span class="visible-xs"><i class="fa fa-cutlery"></i></span>
                <span class="hidden-xs">{{$dish->dish}}</span>
            </a>
        </li>
        <li class="active">
            <a href="{{url('/dish-price/'.$dish->id)}}" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-usd"></i></span>
                <span class="hidden-xs">Precio del Plato</span>
            </a>
        </li>
        <li class="">
            <a href="{{url('/dish-image/'.$dish->id)}}"  aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-photo"></i></span>
                <span class="hidden-xs">Imagenes del Plato</span>
            </a>
        </li>
        <li class="">
            <a href="{{url('/dish-recipe/'.$dish->id)}}" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-photo"></i></span>
                <span class="hidden-xs">Receta</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <form class="form-inline" id="dishPriceForm" method="post" action="{{url('/save-dish-price')}}" data-parsley-validate novalidate>
                {{csrf_field()}}
                <input type="hidden" value="{{$dish->id}}" id="dishId" name="dish_id">
                <div class="form-group m-r-10">
                    <label>Tipo de Plato </label>
                    <input type="text" name="dish_type" required class="form-control"  placeholder="...">
                </div>
                <div class="form-group m-r-10">
                    <label>Precio </label>
                    <div class="input-group m-t-8">
                        <span class="input-group-addon">{{config('restaurant.currency.symbol')}}</span>
                        <input type="number" required  name="price" class="form-control" placeholder="..">
                    </div>

                </div>
                <button type="submit"  class="btn btn-default waves-effect waves-light btn-md">
                    Guardar
                </button>

            </form>
            <hr>
            <ul class="list-unstyled transaction-list">
                @forelse($dish->dishPrices as $dish_price)

                <li>
                    <i class="ti-download text-success"></i>
                    <span class="text">Un plato - {{$dish_price->dish_type}}</span>
                    <span class="text-success tran-price">{{config('restaurant.currency.symbol')}} {{number_format($dish_price->price,2)}} {{config('restaurant.currency.currency')}}</span>
                    <span class="pull-right">|
                        <a href="{{url('/edit-dish-price/'.$dish_price->id)}}" class="btn btn-link"><i class="fa fa-pencil"></i></a>
                        <a href="#" onclick="$(this).confirmDelete('/delete-dish-type/'+{{$dish_price->id}})" class="btn btn-link text-danger"><i class="fa fa-trash-o"></i></a>
                    </span>
                    <span class="pull-right text-muted">{{$dish_price->created_at->format('d-M-Y')}} </span>
                    <span class="clearfix"></span>
                </li>
                @empty
                   <p>Nada Encontrado.</p>
                @endforelse
            </ul>


        </div>
    </div>
@endsection
