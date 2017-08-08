<!--$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('process_id')->unsigned();
            $table->string('imagen')->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('subtype_id')->unsigned();
            $table->string('name');
            $table->string('condition')->nullable();
            $table->string('notes');
            $table->string('place');
            $table->string('colors');
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
                <div class="panel-heading barra">Registra la mascota que extraviaste</div>

                <div class="panel-body">
                    {!!Form::open(['route'=>'pet.store','method'=>'POST', 'files' => true])!!}

                        {{Form::hidden('process_id', $process_id)}}

                        <div class="form-group">
                            {!!form::label('Tipo de mascota')!!}
                            {!!form::select('type_id', $typePets, null,['placeholder' => 'Seleccione un tipo', 'onchange' => 'filterSubTypePet(this)', 'id' => 'selector_pets', 'class' => 'form-control selector', 'required'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Raza')!!}
                            <select name="subtype_id" id="selector_subtype" class="form-control selector" required></select>
                        </div>

                        <div class="form-group">
                            {!!form::label('Nombre de tu mascota')!!}
                            {!!form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Nombre de tu mascota'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Color')!!}
                            {!!form::text('colors',null,['id'=>'colors','class'=>'form-control','placeholder'=>'Los colores de tu mascota'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('¿Alguna condición especial?')!!}
                            {!!form::text('condition',null,['id'=>'condition','class'=>'form-control','placeholder'=>'Tiene alguna condición especial'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('¿Alguna nota especial que pueda ayudar?')!!}
                            {!!form::text('notes',null,['id'=>'notes','class'=>'form-control','placeholder'=>'Ayudanos con información adicional'])!!}
                        </div>

                        <div class="form-group">
                            {!!form::label('Lugar o barrio donde la extraviaste')!!}
                            {!!form::text('place',null,['id'=>'place','class'=>'form-control','placeholder'=>'Información del lugar, si lo tienes'])!!}
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
                            {!!Form::label('¿Tienes una imagen?')!!}
                            {!! Form::file('imagen', ['class' => 'form-control'])!!}
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
     /*window.onload = function() {
        let selectorStates = document.querySelector("#state_selector");
        let selectorSubType = document.querySelector("#selector_subtype");

        filterCities(selectorStates);
        filterSubTypePet(selectorSubType);
    }*/ 

    function filterCities(select) {
        getOptions("#cities_selector", window.location.origin + "/getcities/", select.value, 1);
    }

    function filterSubTypePet(select) {
        getOptions("#selector_subtype", window.location.origin + "/getsubtypepets/", select.value, 0);
    }
 
</script>
@endsection
