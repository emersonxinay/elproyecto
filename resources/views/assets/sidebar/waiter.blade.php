<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Opciones</li>

                <li class="">
                    <a href="{{url('/home')}}" class="waves-effect"><i class="ti-home"></i> <span> Panel </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-notepad"></i> <span> Pedidos</span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/new-order')}}">Nuevo Pedido</a></li>
                        <li><a href="{{url('/my-orders')}}">Mi Pedido</a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{url('/kitchen-status')}}" class="waves-effect"><i class="icon icon-fire"></i> <span> Estado de la Cocina</span> </a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>