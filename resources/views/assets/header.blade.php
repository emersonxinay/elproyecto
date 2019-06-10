<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{url('/')}}" class="logo">
                <i class="icon-c-logo my-logo">R</i>
                <span class="my-logo">Restaurant Pepita</span>
            </a>
            <!-- Image Logo here -->
            {{--<a href="{{url('/')}}" class="logo">--}}
            {{--<i class="icon-c-logo"> <img src="http://via.placeholder.com/350x150" height="42"/> </i>--}}
            {{--<span><img src="http://via.placeholder.com/350x150" height="20"/></span>--}}
            {{--</a>--}}
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                @guest
                @if(config('restaurant.hasInstall') == true)
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li><a href="{{ route('login') }}" class="waves-effect waves-light">Ingresar</a></li>
                        @if(\App\User::first())

                        @else
                        <li><a href="{{ route('register') }}" class="waves-effect waves-light">Registrarse</a></li>
                        @endif
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li><a href="{{url('/install')}}" class="waves-eefect waves-light">Instalar</a></li>
                    </ul>
                @endif
                @else


                    @admin
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a href="{{url('/new-order')}}" class="waves-effect waves-light">Nueva Orden</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false">Menu Corto<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/live-kitchen')}}">Cocina en Vivo</a></li>
                                <li><a href="{{url('/kitchen-stat')}}">Reporte de Cocina</a></li>
                                <li><a href="{{url('/waiter-stat')}}">Reporte de Camarero</a></li>
                                <li><a href="{{url('/dish-stat')}}">Reporte de Platos</a></li>
                            </ul>
                        </li>
                    </ul>
                    @endadmin

                    @manager
                        <ul class="nav navbar-nav hidden-xs">
                            <li><a href="{{url('/new-order')}}" class="waves-effect waves-light">Nueva Orden</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">Menu Corto <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('/live-kitchen')}}">Cocina en Vivo</a></li>
                                    <li><a href="{{url('/kitchen-stat')}}">Reporte de Cocina</a></li>
                                    <li><a href="{{url('/waiter-stat')}}">Reporte de Camaorero</a></li>
                                    <li><a href="{{url('/dish-stat')}}">Reporte de Platos</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endmanager


                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown top-menu-item-xs">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown"
                               aria-expanded="true"><img src="{{auth()->user()->image ? auth()->user()->image : url('/img_assets/default-thumbnail.jpg')}}" alt="user-img"
                                                         class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/profile')}}"><i class="ti-user m-r-10 text-custom"></i> Perfil</a>
                                </li>
                                <li><a href="{{url('/profile-edit')}}"><i class="ti-settings m-r-10 text-custom"></i> Ajustes</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ti-power-off m-r-10 text-danger"></i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endguest
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
