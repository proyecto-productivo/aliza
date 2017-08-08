
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading barra">¿Qué buscas?</div>

                <div class="panel-body">
                    {!!Form::open(['route'=>'search.store','method'=>'POST', 'files' => true])!!}

                        <div class="form-group">
                            {!!form::label('Mascota')!!}
                            {{ Form::radio('search_type', 'pet') }}

                            {!!form::label('Documento')!!}
                            {{ Form::radio('search_type', 'document') }}
                        </div>

                        <div class="form-group">
                            {!!form::label('¿Cómo realizamos tu busqueda?')!!}
                            <select name="search_by" id="search_by" class="form-control">
                                <option value="all">Todos los campos</option>
                                <option value="number">Número</option>
                                <option value="name">Nombre</option>
                                <option value="place">Lugar</option>
                                <option value="City">Ciudad</option>
                            </select>
                        </div>

                        <div class="form-group">
                            {!!form::label('Realiza tu búsqueda')!!}
                            {!!form::text('search',null,['id'=>'search','class'=>'form-control','placeholder'=>'Buscar'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::submit('Buscar',['name'=>'save','id'=>'save','class'=>'btn btn-primary btn-block boton'])!!}
                        </div>

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
