@extends('layouts.app')

@section('title')
    Add Employee
@endsection

@section('content')
    {{--Page header--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/all-employee')}}" class="btn btn-default waves-effect">Todos los empleados <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Crear Nuevo Empleado </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Empleado
                </li>
                <li class="active">
                    Anadir Empleado
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" action="#" id="addEmployee" method="post"
                              enctype="multipart/form-data" data-parsley-validate novalidate>
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="" class="col-md-2 control-label">Foto</label>
                                <div class="col md-10">
                                    <div id="image-preview">
                                        <label for="image-upload" id="image-label">Escoge una Foto</label>
                                        <input type="file" name="thumbnail" id="image-upload"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nombre Completo :</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" value=""
                                           placeholder="Nombre del empleado" parsley-trigger="change" maxlength="50" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="example-email">Correo</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" class="form-control" placeholder="Correo del empleado"
                                           parsley-trigger="change" maxlength="50" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Contraseña</label>
                                <div class="col-md-8">
                                    <input type="password" minlength="5" maxlength="20" name="password" placeholder="Password" class="form-control"
                                           value="" id="pass1" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Vuelva a escribir la contraseña</label>
                                <div class="col-md-8">
                                    <input type="password" placeholder="Vuela a escribir la contraseña" class="form-control" value=""
                                           data-parsley-equalto="#pass1" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Tipo de empleado:</label>
                                <div class="col-md-6">
                                    <select name="role" id="" class="form-control" required>
                                        <option value="">Seleccione Uno</option>
                                        <option value="2">Gerente de Tienda</option>
                                        <option value="3">Cocinero</option>
                                        <option value="4">Camarero</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Telefono</label>
                                <div class="col-md-8">
                                    <input type="text" maxlength="20" name="phone" placeholder="Numero Telefonico" class="form-control"
                                           value="" data-parsley-type="digits" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Direccion :</label>
                                <div class="col-md-8">
                                    <textarea minlength="10" class="form-control" required name="address"
                                              rows="5"></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="ladda-button btn btn-purple" data-style="expand-right">Guardar Empleado

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
        $(document).ready(function (e) {
            var addEmployeeForm = $("#addEmployee");
            addEmployeeForm.on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $(this).speedPost('/save-employee', formData, message = {
                    success: {header: 'Employee Update successfully', body: 'Employee updated successfully'},
                    error: {header: 'Email address already exist', body: 'Email address found'},
                    warning: {header: 'Internal Server Error', body: 'Internal server error'}
                },addEmployeeForm);
            });

        })
    </script>
@endsection