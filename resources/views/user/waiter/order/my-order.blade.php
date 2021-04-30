@extends('layouts.app')

@section('title')
    All Order
@endsection

@section('content')
    <div class="card-box table-responsive">

        <h4 class="m-t-0 header-title"><b>Todas las Ordenes</b></h4>
        <p class="text-muted font-13 m-b-30">
           <!-- Responsive is an extension for DataTables that resolves that problem by optimising the
            table's layout for different screen sizes through the dynamic insertion and removal of
            columns from the table.-->
        </p>

        <table id="datatable-responsive"
               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                {{--<th>#</th>--}}
                <th>Orden No</th>
                <th>Servido Por :</th>
                <th>Estado</th>
                <th>Valor del Pedido</th>
                <th width="120px">Acciones</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($orders as $oder)
                <tr>
                    {{--<td>{{$count++}}</td>--}}
                    <td>{{$oder->id}}</td>
                    <td>{{$oder->servedBy->name}}</td>
                    <td>{{$oder->status == 0 ? 'Due' : 'Paid' }}</td>
                    <td>
                        {{$oder->orderPrice->sum('gross_price')}}

                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{url('/edit-order/'.$oder->id)}}" class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-info waves-effect waves-light">
                                <i class="fa fa-info"></i>
                            </a>
                            <a href="#" class="btn btn-purple waves-effect waves-light">
                                <i class="fa fa-print"></i>
                            </a>
                            <a href="#" class="btn btn-danger waves-effect waves-light">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    Todas las Ordenes
@endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
            $("#datatable-responsive").DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "order": [[ 0, "desc" ]]
            });
        })
    </script>

@endsection