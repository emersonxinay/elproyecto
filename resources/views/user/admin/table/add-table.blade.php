@extends('layouts.app')

@section('title')
    Add Table
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-table')}}" class="btn btn-default waves-effect">Añadir Mesa <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Agregar Mesa </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Control de Mesas
                </li>
                <li class="active">
                    Añadir Mesa
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" action="#" id="addTable" method="post"
                              enctype="multipart/form-data" data-parsley-validate novalidate>
                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="col-md-2 control-label">Mesa :</label>
                                <div class="col-md-8">
                                    <input type="text" name="table_no" class="form-control" value=""
                                           placeholder="No Mesa /Nombre de la Mesa" parsley-trigger="change" maxlength="50" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Capacidad :</label>
                                <div class="col-md-8">
                                    <input type="number" min="1" name="table_capacity" class="form-control" value=""
                                           placeholder="Capacidad de la Mesa" parsley-trigger="change" maxlength="50" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="ladda-button btn btn-purple" data-style="expand-right">Guardar 

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
            $("#addTable").on('submit',function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                var addTableForm = $("#addTable");
                $(this).speedPost('/save-table', formData, message = {
                    success: {header: 'Mesa Guardada con Exito', body: 'Mesa Guardada con Exito'},
                    error: {header: 'Mesa ya Existe', body: 'Mesa Encontrada'},
                    warning: {header: 'Error del Servidor', body: 'Error del Servidor'}
                },addTableForm);
            })
        })
    </script>

@endsection