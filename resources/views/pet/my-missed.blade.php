@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis mascotas extraviadas</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Raza</th> 
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($pets as $pet)
                            <tr>
                                <td>{{$pet->created_at->diffForHumans()}}</td>
                                <td>{{$pet->type_id}}</td>
                                <td>{{$pet->subtype_id}}</td>
                                <td>{{$pet->status_id}}</td>
                                <td>
                                    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection