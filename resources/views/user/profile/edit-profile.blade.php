@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" action="#" id="updateProfile" method="post"
                                  enctype="multipart/form-data" data-parsley-validate novalidate>
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">Foto</label>
                                    <div class="col md-10">
                                        <div id="image-preview" style="background-image: url({{url(auth()->user()->image != "" | null ? auth()->user()->image : '/img_assets/avater.png')}})">
                                            <label for="image-upload" id="image-label">Suba una Foto</label>
                                            <input type="file" name="thumbnail" id="image-upload"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nombre Completo :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}"
                                               placeholder="Nombre del Empleado" parsley-trigger="change" maxlength="50" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" placeholder="Email"
                                               parsley-trigger="change" maxlength="50" required>

                                    </div>
                                </div>
                                @if(auth()->user()->role != 1)
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Telefono </label>
                                    <div class="col-md-8">
                                        <input type="text" maxlength="20" name="phone"  placeholder="Telefono" class="form-control"
                                               value="{{auth()->user()->role != 1 ? auth()->user()->employee->phone : ''}}" data-parsley-type="digits" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Direccion:</label>
                                    <div class="col-md-8">
                                    <textarea minlength="10" class="form-control" required name="address"
                                              rows="5">{{auth()->user()->role != 1 ? auth()->user()->employee->address : ''}}</textarea>
                                    </div>
                                </div>
                                @endadmin
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="ladda-button btn btn-purple" data-style="expand-right">Actualizar

                                        </button>
                                        <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-link">Cambia la Contraseña</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cambia la Contraseña</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="passForm" data-parsley-validate novalidate>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Contraseña Actual</label>
                            <input required type="password" name="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nueva Contraseña</label>
                            <input required type="password" name="new_password" id="pass1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Repite la Contraseña</label>
                            <input  data-parsley-equalto="#pass1" required type="password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="submitChangePassForm" type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
           $("#updateProfile").on('submit',function (e) {
               e.preventDefault();
               var formDate = new FormData(this);
               @if(auth()->user()->role == 1)
                 $(this).speedPost('/post-admin-profile', formDate, message = {
                   success: {header: 'Profile Update successfully', body: 'Profile updated successfully'},
                   error: {header: 'Email address already exist', body: 'Email address found'},
                   warning: {header: 'Internal Server Error', body: 'Internal server error'}
                });
               @else
                $(this).speedPost('/post-profile', formDate, message = {
                   success: {header: 'Profile Update successfully', body: 'Profile updated successfully'},
                   error: {header: 'Email address already exist', body: 'Email address found'},
                   warning: {header: 'Internal Server Error', body: 'Internal server error'}
               });
               @endif
           });
           
           $("#submitChangePassForm").on('click',function () {
                $("#passForm").submit();

           });

           $("#passForm").on('submit',function (e) {
               e.preventDefault();
               var formDate = new FormData(this);
               $(this).speedPost('/change-password',formDate,message = {
                   success: {header: 'Success', body: 'Password has been changed successfully'},
                   error: {header: 'Error', body: 'Password not match'},
                   warning: {header: 'Warning', body: 'The password you given is not match as current password. Password cannot change'}
               },$('#passForm'))
           })
        });
    </script>
@endsection