
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading barra">¿Qué ha perdido?</div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6 ">
                            <a href="{{route('search-document')}}" class="">
                                <div class="caja-nav">
                                    Un documento
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a href="{{route('search-pet')}}" class="">
                                <div class="caja-nav">
                                    Una mascota
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
