<!--$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('process_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('entity');
            $table->string('name');
            $table->string('notes');
            $table->string('place');
            $table->integer('status_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('owner_id')->unsigned()->nullable();-->


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading barra">Registra el documento que extraviaste</div>

                <div class="panel-body">
                    {!!Form::open(['route'=>'document.store','method'=>'POST'])!!}
                        
                        {{Form::hidden('process_id', $process_id)}}

                        <div class="form-group">
                            {!!form::label('Tipo')!!}
                            {!!form::select('type_id', $typeDocs, null,['class' => 'form-control selector', 'required', 'placeholder' => 'Selecciona un tipo'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Entidad (si aplica)')!!}
                            {!!form::text('entity',null,['id'=>'entity','class'=>'form-control','placeholder'=>'Entidad que expidió el documento'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Número del documento')!!}
                            {!!form::text('number',null,['id'=>'number','class'=>'form-control','placeholder'=>'Número en el documento'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Nombre en documento')!!}
                            {!!form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Su nombre como aparece en el documento'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('¿Alguna nota especial que pueda ayudar?')!!}
                            {!!form::text('notes',null,['id'=>'notes','class'=>'form-control','placeholder'=>'Ayudanos con información adicional'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('¿Barrio donde lo extraviaste?')!!}
                            {!!form::text('place',null,['id'=>'place','class'=>'form-control','placeholder'=>'Información del lugar, si lo conoces'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Departamento')!!}
                            {!!form::select('state_id', $states, null,['placeholder' => 'Seleccione un departamento', 'onchange' => 'filterCities(this)', 'class' => 'form-control selector', 'required', 'id' => 'state_selector'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Ciudad')!!}
                            <select name="city_id" id="cities_selector" class="form-control selector" required></select>
                        </div>

                        <div class="form-group">
                            {!!form::submit('Guardar',
                            ['name'=>'save','id'=>'save','content'=>'<span>Grabar</span>','class'=>'btn btn-primary  btn-block boton'])!!}
                        </div>


                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/filters.js') }}"></script>
<script>

    function filterCities(select) {
        getOptions("#cities_selector", window.location.origin + "/getcities/", select.value, 1);
    }
 
</script>
@endsection
