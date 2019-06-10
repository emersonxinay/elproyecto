@extends('layouts.app')

@section('title')
    All Units
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/add-unit')}}" class="btn btn-default waves-effect">Agregar Unidad <span class="m-l-5"><i class="fa fa-plus"></i></span></a>
            </div>

            <h4 class="page-title">Unidad</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Ajustes
                </li>
                <li class="active">
                    Ajustes de la Unidad
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
                <th>Unidad</th>
                <th>Informacion</th>
                <th width="80px">Actiones</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($units as $unit)
                <tr>
                    <td>{{$count++}} .</td>
                    <td>
                        {{$unit->unit}}
                    </td>
                    <td>
                        @if($unit->status == 1)
                            Active
                            @else
                            InActive
                        @endif
                    </td>

                    <td>
                        <div class="btn-group-justified">
                            <a href="{{url('/edit-unit/'.$unit->id)}}" class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#" onclick="$(this).confirmDelete('/delete-unit/'+{{$unit->id}})" class="btn btn-danger waves-effect waves-light">
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
        })
    </script>

@endsection