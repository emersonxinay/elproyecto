@extends('layouts.app')

@section('title')
    Dish Price - {{$dish->dish}}
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-dish')}}" class="btn btn-default waves-effect">Todo los Platos <span class="m-l-5"></span></a>
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
        <li class="">
            <a href="{{url('/edit-dish/'.$dish->id)}}" aria-expanded="true">
                <span class="visible-xs"><i class="fa fa-cutlery"></i></span>
                <span class="hidden-xs">{{$dish->dish}}</span>
            </a>
        </li>
        <li class="">
            <a href="{{url('/dish-price/'.$dish->id)}}" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-usd"></i></span>
                <span class="hidden-xs">Precio del Plato</span>
            </a>
        </li>
        <li class="">
            <a href="{{url('/dish-image/'.$dish->id)}}" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-photo"></i></span>
                <span class="hidden-xs">Imagenen del Plato</span>
            </a>
        </li>
        <li class="active">
            <a href="{{url('/dish-recipe/'.$dish->id)}}" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-photo"></i></span>
                <span class="hidden-xs">Receta</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <form class="form-horizontal" role="form" action="{{url('/save-recipes/'.$dish->id)}}" id="updateDish"
                  method="post"
                  enctype="multipart/form-data" data-parsley-validate novalidate>
                {{csrf_field()}}
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Tipo de Plato</label>
                    <div class="col-md-8">
                        <select name="dish_type_id" id="" class="form-control" required>
                            <option value="">Seleccione Uno</option>
                            @foreach($dish->dishPrices as $dishType)
                                <option value="{{$dishType->id}}">{{$dishType->dish_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-email">Producto :</label>
                    <div class="col-md-8">
                        <select name="product_id" id="product" class="form-control" required>
                            <option value="">Seleccione Uno</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}
                                    &nbsp;&nbsp;&nbsp; {{$product->product_code}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-email">Unidad Para Cocinar :</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" name="unit" class="form-control" id="unit_input" step="0.01" required>
                            <span class="input-group-addon" id="unit">.00</span>
                        </div>
                    </div>
                    <label class="col-md-2 control-label" for="example-email">Unidad peque??a para Cocinar
                        :</label>
                    <div class="col-md-3 input-group">
                        <input type="number" name="child_unit" class="form-control" id="child_unit_input" step="0.01"
                               required>
                        <span class="input-group-addon" id="childUnit">.00</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-purple">A??adir Producto a la Receta

                        </button>
                    </div>
                </div>

            </form>


            @foreach($dish->dishPrices as $dishInfo)
                <h2>{{$dishInfo->dish_type}}</h2>
                <div class="p-20">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Unidad</th>
                                <th>Unidad Hijo</th>
                                <th>Creador</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach($dish->dishRecipes as $recipe)
                                @if($recipe->dishType->dish_type == $dishInfo->dish_type)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$recipe->product->product_name}}</td>
                                        <td>{{$recipe->unit_needed}} - {{$recipe->product->unit->unit}}</td>
                                        <td>{{$recipe->child_unit_needed}} - {{$recipe->product->unit->child_unit}}</td>
                                        <td>{{$recipe->user_id}}</td>
                                        <td>
                                            <a href="{{url('/delete-recipes/'.$recipe->id)}}" class="btn btn-danger">Borrar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    </div>
@endsection

@section('extra-js')

    <script src="{{ url('/dashboard/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        var convert_rate = 0;
        $(document).ready(function () {
            $("#unit_input").on('keyup', function () {
                if (convert_rate != 0) {
                    $("#child_unit_input").val($("#unit_input").val() * convert_rate);
                }

            });

            $("#child_unit_input").on('keyup', function () {
                if (convert_rate != 0) {
                    $("#unit_input").val($("#child_unit_input").val() / convert_rate);
                }
            });
            $("#product").on('change', function () {
                $.get('/get-unit-of-product/' + $("#product").val(), function (data) {
                    console.log(data);
                    $("#unit").text(data.unit.unit);
                    $("#childUnit").text(data.unit.child_unit);
                    convert_rate = data.unit.convert_rate;
                });
            });

        });
    </script>

@endsection