@extends('layouts.app')

@section('title')
    Print Order
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" >
                <!-- <div class="panel-heading">
                    <h4>Invoice</h4>
                </div> -->
                <div class="panel-body" id="printNow">
                    <center>
                        <h2>{{config('app.name')}}</h2>
                        <p>
                            Telefono : {{config('restaurant.contact.phone')}}
                            <br>
                            Direccion :  {{config('restaurant.contact.address')}}
                            <br>
                            Vat Reg No : {{config('restaurant.vat.vat_number')}}
                            <br>
                            Servido por : {{$order->servedBy->name}}
                            <br>
                            Mesa : {{$order->table_id}}
                            <br>
                            Orden No : {{str_pad($order->id,4,0,STR_PAD_LEFT)}}
                        </p>
                    </center>
                    <div class="m-h-50"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr><th>Cantidad</th>
                                        <th>Item</th>
                                        <th>Precio</th>
                                        <th>T. Precio</th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($order->orderPrice as $orderDetails)
                                    <tr>
                                        <td>{{$orderDetails->quantity}}</td>
                                        <td>{{$orderDetails->dish->dish}} |{{$orderDetails->dishType->dish_type}}
                                        </td>
                                        <td>{{config('restaurant.currency.symbol')}} {{$orderDetails->net_price}} {{config('restaurant.currency.currency')}}</td>
                                        <td>{{config('restaurant.currency.symbol')}} {{$orderDetails->net_price * $orderDetails->quantity}} {{config('restaurant.currency.currency')}}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border-radius: 0px;">

                        <div class="">
                            <div class="table-responsive">
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td class="text-right">Sub Total :</td>
                                        <th class="text-right">{{config('restaurant.currency.symbol')}} {{ $order->orderPrice->sum('gross_price')}} {{config('restaurant.currency.currency')}}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Vat :</td>
                                        <th class="text-right">{{$order->vat}} %</th>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Precio Bruto Total:</td>
                                        <th class="text-right">{{config('restaurant.currency.symbol')}} {{$order->orderPrice->sum('gross_price')+($order->orderPrice->sum('gross_price')*$order->vat)/100}} {{config('restaurant.currency.currency')}}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Pago :</td>
                                        <th class="text-right">{{config('restaurant.currency.symbol')}} {{$order->payment}} {{config('restaurant.currency.currency')}}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Cambio :</td>
                                        <th class="text-right">{{config('restaurant.currency.symbol')}} {{$order->change_amount}} {{config('restaurant.currency.currency')}}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="hidden-print">
                        @if($order->status > 2)
                        <div class="pull-right">
                            @if($order->user_id == 0)
                            <a href="#" id="submit" class="btn btn-primary waves-effect waves-light">Enviar e imprimir</a>
                            @else
                                <button id="print" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i>Imprimir</button>
                            @endif
                        </div>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
    <script src="{{url('/dashboard/js/printThis.js')}}"></script>
    <script>
        $(document).ready(function () {
            console.log('Ready............');
            $('#submit').on('click',function () {
                console.log("dsf");
                var configm = confirm('If You submit this order you are not able to edit this order again. Are You sure to submit this Order ?');
                if(configm){
                    $("#printNow").printThis();
                    $.get('/marked-order/{{$order->id}}',function (data) {
//                        console.log(data);
                    })
                }

            });

            $("#print").on('click',function () {
                $("#printNow").printThis();
            })
        })
    </script>
@endsection