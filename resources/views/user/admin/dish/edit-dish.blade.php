@extends('layouts.app')

@section('title')
    Dish Price - {{$dish->dish}}
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-dish')}}" class="btn btn-default waves-effect">Todos los Platos<span class="m-l-5"></span></a>
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
                    Editar Plato
                </li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="{{url('/edit-dish/'.$dish->id)}}"  aria-expanded="true">
                <span class="visible-xs"><i class="fa fa-cutlery"></i></span>
                <span class="hidden-xs">{{$dish->dish}}</span>
            </a>
        </li>
        <li class="">
            <a href="{{url('/dish-price/'.$dish->id)}}"  aria-expanded="false">
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
            <a href="{{url('/dish-recipe/'.$dish->id)}}"  aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-photo"></i></span>
                <span class="hidden-xs">Receta</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <form class="form-horizontal" role="form" action="#" id="updateDish" method="post"
                  enctype="multipart/form-data" data-parsley-validate novalidate>
                {{csrf_field()}}
                <input type="hidden" value="{{$dish->id}}" id="dishId">
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Fotografia<span class="text-danger">*</span> </label>
                    <div class="col md-10">
                        <div id="image-preview" style="background-image: url({{url($dish->thumbnail != "" | null ? $dish->thumbnail : '/img_assets/avater.png')}})">
                            <label for="image-upload" id="image-label">Suba una Foto</label>
                            <input type="file" name="thumbnail" id="image-upload"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre del Plato <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" name="dish" class="form-control" value="{{$dish->dish}}"
                               placeholder="Nombre del Plato" parsley-trigger="change" maxlength="50" required>
                    </div>
                </div>



                    <div class="checkbox checkbox-custom checkbox-circle col-md-offset-2">
                        <input id="checkbox71" name="available" type="checkbox" {{$dish->available == 1 ? 'checked' : ''}}>
                        <label for="checkbox71">
                            Disponible
                        </label>
                    </div>

                <br>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-purple">Actualizar Plato</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('extra-js')

    <script>
        $(document).ready(function () {
           $("#updateDish").on('submit',function (e) {
               e.preventDefault();
               var formData = new FormData(this);
               var id = $("#dishId").val();
               $(this).speedPost('/update-dish/'+id, formData, message = {
                   success: {header: 'Actualizacion del Plato', body: 'Actualizacion Con Exito'},
                   error: {header: 'Plato ya Existe', body: 'Plato Encontrado'},
                   warning: {header: 'Error del Servidor', body: 'Error del Servidor'}
               });
           })
        });
    </script>

@endsection