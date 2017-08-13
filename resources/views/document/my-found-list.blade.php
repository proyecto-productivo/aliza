@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading barra">Mis documentos encontrados</div>

                <div class="panel-body">
                    <div class="form-group">
                        @include('flash::message')
                    </div>
                    <table class="table">
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo doc</th>
                            <th>Número</th> 
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($documents as $document)
                            <tr>
                                <td>{{$document->created_at->diffForHumans()}}</td>
                                <td>{{$document->type_id}}</td>
                                <td>{{$document->number}}</td>
                                <td>{{$document->status_id}}</td>
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
