<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Opciones</li>

                <li class="has_sub">
                    <a href="{{url('/home')}}" class="waves-effect"><i class="ti-home"></i> <span> Panel </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon icon-chart"></i> <span> Reportes </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/kitchen-stat')}}">Cocina</a></li>
                        <li><a href="{{url('/waiter-stat')}}">Mozos</a></li>
                        <li><a href="{{url('/dish-stat')}}">Platos</a></li>
                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon icon-fire"></i> <span> Cocina </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/live-kitchen')}}">Cocina en vivo</a></li>
                        {{--<li><a href="{{url('/kitchen-stat')}}">Estadistica de la Cocina</a></li>--}}
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-notepad"></i> <span> Ordenes </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/new-order')}}">Nueva Orden</a></li>
                        <li><a href="{{url('/all-order')}}">Lista de Ordenes</a></li>
                        <li><a href="{{url('/non-paid-order')}}">Ordenes no Pagadas</a></li>
                    </ul>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-truck"></i> <span> Proveedor </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/add-supplier') }}">Agregar Proveedor</a></li>
                        <li><a href="{{ url('/all-supplier') }}">Lista de Proveedores</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{isset($account_menu) ? 'active' : ''}}"><i class="icon icon-calculator"></i><span> Contabilidad </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>Gastos</span>  <span class="menu-arrow"></span></a>
                            <ul style="">
                                {{--<li><a href="{{url('/new-purses')}}"><span>Nuevo Bolso</span></a></li>--}}
                                <li><a href="{{url('/add-expense')}}"><span>Agregar Gastos</span></a></li>
                                <li><a href="{{url('/all-expanse')}}"><span>Todos los Gastos</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{url('/all-income')}}"><span>Ingresos</span></a>
                        </li>

                    </ul>

                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Gestion de Mesas</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/add-table')}}">Agregar Mesa</a></li>
                        <li><a href="{{url('/all-table')}}">Lista de Mesas</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-package"></i><span> Stock </span><span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/new-purses')}}">Nuevo Producto</a></li>
                        <li><a href="{{url('/all-purses')}}">Todos los Productos</a></li>
                        <li><a href="{{url('/add-item')}}">Subir Producto</a></li>
                        <li><a href="{{url('/all-item')}}">Todo el Stock</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cutlery"></i><span> Platos </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/add-dish')}}">Agregar Plato</a></li>
                        <li><a href="{{url('/all-dish')}}">Todos los Platos</a></li>
                    </ul>
                </li>

                <li class="text-muted menu-title">Mas</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon icon-people"></i><span> Colaboradores </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/add-employee')}}">Agrergar Colaborador</a></li>
                        <li><a href="{{url('/all-employee')}}">Colaboradores</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon icon-settings"></i><span> Configuraciones </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/all-product-type')}}">Tipo de Producto</a></li>
                        <li><a href="{{url('/all-unit')}}">Unidad</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
