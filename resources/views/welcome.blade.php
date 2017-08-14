
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading barra">¿Como te ayudamos?</div>
                    {{--  <div class="row">
                        <div class="col-xs-12">
                            <a href="">
                                <div class="caja-nav">
                                    Buscar algo en Aliza
                                </div>
                            </a>
                        </div>
                    </div>  --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-6 ">
                            <a href="{{route('go-missed')}}" class="decoration--none">
                                <div class="caja-nav">
                                    Perdí algo
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a href="{{route('go-found')}}" class="decoration--none">
                                <div class="caja-nav">
                                    Encontré algo
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="slogan">
                <h2>ALIZA.COM.CO</h2>
                <h3>Ayudamos a encontrar tus mascotas y documentos extraviados</h3>
                <h>Personas que ayudan a otras personas</h2>
                <a href="{{route('register')}}"><h>Registrarse</h2></a>
            </div>
        </div>
    </div> 
</div>
@endsection
