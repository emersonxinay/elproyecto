@extends('layouts.app')

@section('title')
    Add Table
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/add-table')}}" class="btn btn-default waves-effect">Agregar Mesa <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Mesas </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Control de Mesas
                </li>
                <li class="active">
                    Todas las Mesas
                </li>
            </ol>
        </div>
    </div>
    <div class="card-box table-responsive">
        <table id="datatable-responsive"
               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>No Mesa</th>
                <th>Capacidad</th>
                <th>Estado</th>
                <th width="100px">Actiones</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{$count++}} .</td>
                    <td>{{$table->table_no}}</td>
                    <td>{{$table->table_capacity}}</td>
                    <td>
                        @if($table->status == 1)
                            Activo
                            @else
                        In-Activo
                            @endif
                    </td>

                    <td>
                        <div class="btn-group">
                            <a href="{{url('/edit-table/'.$table->id)}}" class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" onclick="$(this).confirmDelete('/delete-table/'+{{$table->id}})" class="btn btn-danger waves-effect waves-light">
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