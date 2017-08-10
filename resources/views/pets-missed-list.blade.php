
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading barra">Mascotas reportadas como perdidas</div>
                    <div class="row">
                        @foreach($pets as $pet)
                            <div class="col-xs-12 col-md-4">
                                <div class="card">
                                    <img src="{{Storage::url($pet->imagen)}}" alt="Avatar" style="width:100%">
                                    <div class="container">
                                        <h4><b>{{$pet->name}}</b></h4> 
                                        <p>{{$pet->created_at->diffForHumans()}}</p> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-xs-12 col-md-4">
                            <div class="card">
                                <img src="https://www.anipedia.net/imagenes/que-comen-los-perros.jpg" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <h4><b>John Doe</b></h4> 
                                    <p>Architect & Engineer</p> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="card">
                                <img src="https://www.anipedia.net/imagenes/que-comen-los-perros.jpg" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <h4><b>John Doe</b></h4> 
                                    <p>Architect & Engineer</p> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="card">
                                <img src="https://www.anipedia.net/imagenes/que-comen-los-perros.jpg" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <h4><b>John Doe</b></h4> 
                                    <p>Architect & Engineer</p> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="card">
                                <img src="https://www.anipedia.net/imagenes/que-comen-los-perros.jpg" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <h4><b>John Doe</b></h4> 
                                    <p>Architect & Engineer</p> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="card">
                                <img src="https://www.anipedia.net/imagenes/que-comen-los-perros.jpg" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <h4><b>John Doe</b></h4> 
                                    <p>Architect & Engineer</p> 
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        {{ $pets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
