@extends('layouts.app')

@section('title')
    Purses List
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box" id="app">
                <center>
                    <h4 class="m-t-0 header-title"><b>Purses</b></h4>
                    <p>

                    </p>
                </center>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" action="{{url('/save-purses-product/'.$purses->id)}}" method="post"
                              enctype="multipart/form-data" data-parsley-validate novalidate>
                            {{csrf_field()}}


                            <div class="form-group">
                                <input type="hidden" value="{{$purses->id}}" id="purses_id">

                                <label for="" class="col-md-2 control-label">Seleciona Producto</label>
                                <div class="col-md-3">
                                    <select name="product_id" id="product" class="form-control" required>
                                        <option value="">Selecciona Uno</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}
                                                | {{$product->product_code}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-1 control-label" for="example-email">Cantidad :</label>
                                <div class="col-md-2">
                                    <div class="input-group ">
                                        <input type="text" id="quantity" name="quantity" class="form-control"
                                               placeholder="Cantidad">
                                        <span class="input-group-addon" id="unit">Unidad</span>
                                    </div>
                                </div>
                                <label class="col-md-1 control-label" for="example-email">Precio Unidad :</label>
                                <div class="col-md-2">
                                    <input type="number" min="1" name="unit_price" class="form-control"
                                           placeholder="Precio Unitrio"
                                           parsley-trigger="change" maxlength="50" required id="unitPrice">
                                </div>
                            </div>



                            <div class="form-group">

                                <label for="" class="col-md-2 control-label">Precio Unidad Pequeño</label>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input readonly  type="text" id="child_unit_price" name="child_unit_price"
                                               class="form-control"
                                               placeholder="Precio Unidad Pequeño">
                                        <span class="input-group-addon" id="child_unit">Unidad</span>
                                    </div>
                                </div>

                                <label class="col-md-1 control-label" for="example-email">Precio Bruto</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"
                                              id="">{{config('restaurant.currency.symbol')}}</span>
                                        <input disabled type="number" min="1" name="product_name" class="form-control"
                                               placeholder="Precio Bruto"
                                               parsley-trigger="change" maxlength="50" required id="grossPrice">
                                        <span class="input-group-addon"
                                              id="">{{config('restaurant.currency.currency')}}</span>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-purple">
                                        Bolso ahora

                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="p-20">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Proveedor</th>
                                <th>Producto</th>
                                <th width="100px">Cantidad</th>
                                <th width="150px">Precio Unitario</th>
                                <th>Precio Unitario Pequeño</th>
                                <th>Precio Bruto</th>
                                <th width="95px">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                                @foreach($purses->pursesProducts as $product)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$purses->supplier->name}}</td>
                                        <td>{{$product->product->product_name}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{config('restaurant.currency.symbol')}} {{$product->unit_price}} {{config('restaurant.currency.currency')}}</td>
                                        <td> {{config('restaurant.currency.symbol')}}{{$product->child_unit_price}} {{config('restaurant.currency.currency')}} </td>
                                        <th>{{config('restaurant.currency.symbol')}} {{$product->gross_price}} {{config('restaurant.currency.currency')}}</th>

                                        <td>
                                            @if(count($purses->pursesProducts) > 1)
                                                <a href="#" onclick="return confirmDelete('/delete-purses-product/{{$product->id}}')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>
                                                </a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            <?php
                            $pursesPrice = $purses->pursesProducts->sum('gross_price');
                            $pursesPaymentPrice = $purses->pursesPayments->sum('payment_amount');

                            ?>

                            <tr>
                                <th colspan="5"></th>
                                <th class="text-right">Total :</th>
                                <th>{{config('restaurant.currency.symbol')}} {{ number_format($pursesPrice,2,'.',',')}} {{config('restaurant.currency.currency')}}</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="5"></th>
                                <th class="text-right">Pago Total :</th>
                                <th>{{config('restaurant.currency.symbol') }} {{number_format($pursesPaymentPrice,2,'.',',') }} {{config('restaurant.currency.currency')}}</th>
                                <th>{{count($purses->pursesPayments)}} Payment</th>
                            </tr>
                            @if($pursesPrice - $pursesPaymentPrice == 0)
                                <tr>
                                    <th colspan="6"></th>
                                    <th>
                                        <h4 class="text-success"><label for="">Pagado</label></h4>
                                    </th>
                                </tr>
                            @else
                                <tr>
                                    <th colspan="5"></th>
                                    <th class="text-right">Total a Pagar :</th>
                                    <th>{{config('restaurant.currency.symbol') }} {{ number_format($pursesPrice - $pursesPaymentPrice,2,'.',',')  }} {{config('restaurant.currency.currency')}}</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="5"></th>
                                    <th></th>
                                    <th><a href="#" class="btn btn-success">Realizar Un Pago</a> </th>
                                </tr>

                            @endif

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('extra-js')

    <script src="{{ url('/app_js/PursesUpdateController.js') }}"></script>

    <script>
        function  confirmDelete(url) {
            var con = confirm('Are you sure, you want to delete this item from this purses ?');
            if(con){
                console.log('Confirm');
                console.log(url);
                location.replace(url);
            }else{
                console.log('not confirm')
            }
        }
    </script>



@endsection