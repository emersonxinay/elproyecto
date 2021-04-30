@extends('layouts.app')

@section('title')
    My Cooking History
@endsection

@section('content')
    <div class="card-box table-responsive">

        <h4 class="m-t-0 header-title"><b>Historial</b></h4>
        <p class="text-muted font-13 m-b-30">
          <!--  Responsive is an extension for DataTables that resolves that problem by optimising the
            table's layout for different screen sizes through the dynamic insertion and removal of
            columns from the table.-->
        </p>

        <table id="datatable-responsive"
               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Orden ID</th>
                <th>Orden En</th>
                <th>Servido Por</th>
                <th>Estados</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at->format('d-M-Y h:i A')}}</td>
                    <td>{{$order->servedBy->name}}</td>
                    <td>
                        {{$order->status}}
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
