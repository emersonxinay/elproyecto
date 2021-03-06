@extends('layouts.app')

@section('title')
    Edit Expanse
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-table')}}" class="btn btn-default waves-effect">Todos los Gastos <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Modificar Gasto </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li>
                    <a href="#">Contabilidad</a>
                </li>
                <li class="active">
                    Gasto
                </li>
                <li class="active">
                    Modificar Gastos
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="card-box">

            <form class="form-horizontal" role="form" method="post" id="expanseForm" action="#" data-parsley-validate novalidate>
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Motivo del Gasto :</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$expanse->title}}" name="title" required class="form-control" id="inputEmail3" placeholder="Motivo del Gasto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Fecha del Gasto :</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{\Carbon\Carbon::parse($expanse->date)->format('m/d/Y')}}" name="date" required class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">Costo Total</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$expanse->expanse}}" name="expanse" required  data-parsley-type="number" class="form-control" id="inputPassword4" placeholder="Costo ">
                    </div>
                </div>

                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <script src="{{url('/dashboard/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#datepicker-autoclose").datepicker();

            var expanseForm = $("#expanseForm");
            expanseForm.on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $(this).speedPost('/update-expanse/{{$expanse->id}}', formData, message = {
                    success: {header: 'Actualizado con Exito', body: 'Actualizado con Exito'},
                    error: {header: 'Algo Sali?? mal', body: 'Algo sali?? mal'},
                    warning: {header: 'Error del Servidor', body: 'Error del Servidor'}
                });
            });


        })
    </script>
@endsection