@extends('layouts.app')

@section('title')
    Edit Product Type
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-product-type')}}" class="btn btn-default waves-effect">Todos los Tipos de Productos <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Editar Tipo de Producto</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Ajustes
                </li>
                <li class="active">
                    Editar Tipo de Producto
                </li>
            </ol>
        </div>
    </div>

    <div class="card-box">
        <form class="form-horizontal" role="form" id="unitForm" method="POST" data-parsley-validate novalidate>
            {{csrf_field()}}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tipo de Producto<span class="text-danger">*</span> </label>
                <div class="col-sm-7">
                    <input type="text" value="{{$product_type->product_type}}" required id="unit" class="form-control" name="product_type" placeholder="I.e : Spices, Meet">

                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox0" name="status" type="checkbox" {{$product_type->status == 1 ? "checked" : ''}}>
                        <label for="checkbox0">
                            Activo
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        Artualizar el tipo de Producto
                    </button>

                </div>
            </div>
        </form>

    </div>

@endsection

@section('extra-js')

    <script>
        $(document).ready(function () {
            $("#unitForm").on('submit',function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $(this).speedPost('/update-product-type/{{$product_type->id}}',formData,message = {
                    success: {header: 'Tipo de Producto Actualizado con Exito', body: 'Tipo de Producto Actualizado con Exito'},
                    error: {header: 'El tipo de Producto ya Existe', body: 'Tipo de Producto Encontrado'},
                    warning: {header: 'Error de Servidor', body: 'Error de Servidor'}
                });
            })
        })
    </script>
@endsection