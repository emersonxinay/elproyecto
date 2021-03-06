@extends('layouts.app')

@section('content')

    <style>
        .btn-orange{
            background-color: orangered!important;
        }
        .text-orange{
            color: purple!important;
        }
    </style>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Ingresa a <strong class="text-orange ">Hazuki Sushi</strong> </h3>
            {{--{{request()->getHttpHost()}}--}}
            {{--{{request()->getHost()}}--}}
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post" data-parsley-validate novalidate>
                {{csrf_field()}}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required placeholder="Email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required name="password" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup">
                                Recordar Contrase??a
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-success btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> ??No Recuerdas tu Contrase??a?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>??No tienes Una Cuenta? <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Registrate</b></a></p>

        </div>
    </div>
</div>

@endsection
