@extends('layouts.app')

@section('title')
    Add Dish
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-dish')}}" class="btn btn-default waves-effect">Todos los Platos <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Agregar Plato </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Plato
                </li>
                <li class="active">
                    Cambiar Plato
                </li>
            </ol>
        </div>
    </div>

        <ul class="nav nav-tabs">
            <li class="active">
                <a href="{{url('/add-dish')}}" data-toggle="tab" aria-expanded="true">
                    <span class="visible-xs"><i class="fa fa-cutlery"></i></span>
                    <span class="hidden-xs">Nombre del Plato</span>
                </a>
            </li>
            <li class="disabled">
                <a href="javascript:void(0);" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-usd"></i></span>
                    <span class="hidden-xs">Precio del Plato</span>
                </a>
            </li>
            <li class="disabled">
                <a href="javascript:void(0);" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-photo"></i></span>
                    <span class="hidden-xs">Imagen del Plato</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <form class="form-horizontal" role="form" action="{{url('/save-dish')}}" id="addEmployee" method="post"
                      enctype="multipart/form-data" data-parsley-validate novalidate>
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Miniatura <span class="text-danger">*</span> </label>
                        <div class="col md-10">
                            <div id="image-preview">
                                <label for="image-upload" id="image-label">Escoge una Foto</label>
                                <input type="file" name="thumbnail" id="image-upload" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre del Plato <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" name="dish" class="form-control" value=""
                                   placeholder="Nombre del Plato" parsley-trigger="change" maxlength="50" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-10">
                            <button type="submit" class="ladda-button btn btn-purple" data-style="expand-right">
                                Guardar el plato e ir a continuación
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>






@endsection

@section('extra-js')



@endsection