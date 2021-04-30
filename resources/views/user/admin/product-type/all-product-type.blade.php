@extends('layouts.app')

@section('title')
    Add Units
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/add-product-type')}}" class="btn btn-default waves-effect">Agregar tipo de Producto <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Tipo de Producto</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Ajustes
                </li>
                <li class="active">
                    Todos los tipos de Producto
                </li>
            </ol>
        </div>
    </div>

    <div class="card-box">
        <table id="datatable-responsive"
               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Tipo de Producto</th>
                <th>Agregado por</th>
                <th>Estado</th>
                <th width="80px">Acciones</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($product_types as $product_type)
                <tr>
                    <td>{{$count++}} .</td>
                    <td>
                        {{$product_type->product_type}}
                    </td>
                    <td>
                        {{$product_type->user->name}}
                    </td>
                    <td>
                        @if($product_type->status == 1)
                            Active
                        @else
                            InActive
                        @endif
                    </td>

                    <td>
                        <div class="btn-group-justified">
                            <a href="{{url('/edit-product-type/'.$product_type->id)}}" class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#" onclick="$(this).confirmDelete('/delete-product-type/'+{{$product_type->id}})" class="btn btn-danger waves-effect waves-light">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('extra-js')

    <script>
        $(document).ready(function () {
            $("#datatable-responsive").DataTable({
                 "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
            });
        });
    </script>

@endsection