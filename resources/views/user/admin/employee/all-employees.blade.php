@extends('layouts.app')

@section('title')
    All Employee
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{url('/add-employee')}}" class="btn btn-default waves-effect">Añadir Empleado <span class="m-l-5"></span></a>
            </div>

            <h4 class="page-title">Todos los Empleados </h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    Empleado
                </li>
                <li class="active">
                    Todos los Empleados
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
                <th>Foto</th>
                <th>Informacion</th>
                <th>Rol</th>
                <th width="20px">Actiones</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$count++}} .</td>
                    <td>
                        <img src="{{$employee->user->image != '' | null ? $employee->user->image : url('/img_assets/avater.png')}}" alt="" class="img-responsive" width="100px">
                    </td>
                    <td>
                        <dl class="dl-horizontal m-b-0">
                            <dt>
                                Email :
                            </dt>
                            <dd>
                                {{$employee->email}}
                            </dd>
                            <dt>
                                Telefono :
                            </dt>
                            <dd>
                                {{$employee->phone}}
                            </dd>
                            <dt>
                                Direccion :
                            </dt>
                            <dd>
                                {{$employee->address}}
                            </dd>
                            <dt>
                                Creado en :
                            </dt>
                            <dd>
                                {{$employee->created_at->diffForHumans()}}
                            </dd>



                        </dl>

                    </td>
                    <td>
                        <dl class="m-b-0">
                            <dt>
                                Role
                            </dt>
                            <dd>
                                @if($employee->user->role == 2)
                                    <span class="label label-primary">Gerente</span>
                                @elseif($employee->user->role == 3)
                                    <span class="label label-purple">Cocinero</span>
                                @elseif($employee->user->role == 4)
                                    <span class="label label-pink">Camarero</span>
                                @endif
                            </dd>
                            <dt>
                                Estado
                            </dt>
                            <dd>
                                @if($employee->user->active == 1)
                                    <span class="label label-primary">Activo</span>
                                @else
                                    <span class="label label-danger">Inactivo</span>
                                @endif
                            </dd>

                        </dl>

                    </td>
                    <td>
                        <div class="btn-group-vertical">
                            <a href="{{url('/edit-employee/'.$employee->id)}}" class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#" onclick="$(this).confirmDelete('/delete-employee/{{$employee->id}}')" class="btn btn-danger waves-effect waves-light">
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