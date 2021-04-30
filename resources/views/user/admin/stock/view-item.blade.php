@extends('layouts.app')

@section('title')
    {{$item->product_name}} - Details
@endsection

@section('content')

    {{--{{$item->cookedProducts}}--}}
    <div class="card-box">
        <center>
            <img src="{{$item->thumbnail ? url($item->thumbnail) : url('/img_assets/avater.png')}}" alt="" width="150px" class="img-responsive"/>
            <h4 class="header-title">{{$item->product_name}} - Resumen</h4>
            <p>
                Tipo de Producto : <b><i>{{$item->productType->product_type}} </i></b> <br>
                Creado por : <b>{{$item->user->name}}</b> el <i>{{$item->created_at->format('d-M-Y')}}</i> <br>
                Bolso Total : <b>{{$item->purses->sum('quantity')}} {{$item->unit->unit}} |</b>
                Cocinado Total : <b>{{$item->cookedProducts->sum('quantity')}} {{$item->unit->unit}}</b> <br>
                Disponible : <b>{{$item->purses->sum('quantity') - $item->cookedProducts->sum('quantity')}} {{$item->unit->unit}}</b>
            </p>

        </center>
        <h4>Historial</h4>
        <table id="datatable-responsive"
               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Proveedor</th>
                <th>Unidad de Bolso</th>
                <th>Precio Bolso</th>
                <th>Fecha</th>

            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            @foreach($item->purses as $purse)
                <tr>
                    <td>{{$purse->purse->supplier->name}}</td>
                    <td>{{$purse->quantity}} {{$item->unit->unit}}</td>
                    <td>{{config('restaurant.currency.symbol')}} <b>{{$purse->gross_price}}</b> {{config('restaurant.currency.currency')}} </td>
                    <td>{{$purse->created_at->format('d-M-Y')}}</td>
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
                order: [0, 'desc']
            });
        })
    </script>

@endsection