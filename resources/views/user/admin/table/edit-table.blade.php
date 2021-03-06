@extends('layouts.app')

@section('title')
    Edit Table
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-table')}}" class="btn btn-default waves-effect">Todas las Mesas <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Cambiar Mesa </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Control de Mesas
                </li>
                <li >
                    <a href="{{url('/all-table')}}">Todas las Mesas</a>
                </li>
                <li class="active">
                    Cambiar Mesa 
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" action="#" id="updateTable" method="post"
                              enctype="multipart/form-data" data-parsley-validate novalidate>
                            {{csrf_field()}}
                            <input type="hidden" value="{{$table->id}}" id="tableId">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Mesa :</label>
                                <div class="col-md-8">
                                    <input type="text" name="table_no" class="form-control" value="{{$table->table_no}}"
                                           placeholder="Table No / Table Name" parsley-trigger="change" maxlength="50" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Capacidad :</label>
                                <div class="col-md-8">
                                    <input type="number" min="1" name="table_capacity" class="form-control" value="{{$table->table_capacity}}"
                                           placeholder="Table capacity" parsley-trigger="change" maxlength="50" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="ladda-button btn btn-purple" data-style="expand-right">Guardar Mesa

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')

    <script>
        $(document).ready(function () {
            $("#updateTable").on('submit',function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                var id = $("#tableId").val();
                $(this).speedPost('/update-table/'+id, formData, message = {
                    success: {header: 'Mesa Actualizada con Exito', body: 'Mesa Actualizada con Exito'},
                    error: {header: 'Mesa ya Existe', body: 'Mesa ya Existe'},
                    warning: {header: 'Error del Servidor', body: 'Error del Servidor'}
                });
            })
        })
    </script>

@endsection