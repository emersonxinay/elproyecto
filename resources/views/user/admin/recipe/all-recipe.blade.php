@extends('layouts.app')

@section('title')
    All Recipe
@endsection

@section('content')

    <div class="card-box table-responsive">
        <h4 class="m-t-0 header-title"><b>Todas las Recetas</b></h4>
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
                <th width="15px">#</th>
                <th width="150px">Receta Una</th>
                <th width="50px">Nombre del Plato</th>
                <th width="20px">Acciones</th>
            </tr>
            </thead>
            <?php $count = 1; ?>
            <tbody>
            {{--@foreach($dishes as $dish)--}}
                {{--<tr>--}}
                    {{--<td>{{$count++}} .</td>--}}
                    {{--<td>--}}
                        {{--<img src="{{$dish->thumbnail != '' | null ? $dish->thumbnail : url('/img_assets/avater.png')}}" alt="" class="img-responsive" width="100px">--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{$dish->dish}}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--@foreach($dish->dishPrices as $price)--}}
                            {{--<span>Plato Tipo : {{$price->dish_type}}</span>--}}
                            {{--<span class="">- ${{$price->price}} BDT</span>--}}
                            {{--<br>--}}
                        {{--@endforeach--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<a href="#">Haga Clic para ver las Imagenes del Plato</a>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--@if($dish->available)--}}
                            {{--<p>Disponible</p>--}}
                        {{--@else--}}
                            {{--<p>No Disponible</p>--}}
                        {{--@endif--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<div class="btn-group-vertical">--}}
                            {{--<a href="{{url('/edit-dish/'.$dish->id)}}" class="btn btn-success waves-effect waves-light">--}}
                                {{--<i class="fa fa-pencil"></i>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="btn btn-info waves-effect waves-light">--}}
                                {{--<i class="fa fa-info"></i>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="btn btn-danger waves-effect waves-light">--}}
                                {{--<i class="fa fa-trash-o"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>

@endsection