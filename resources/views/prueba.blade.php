
@extends('layouts.app')

@section('content')
@include('flash::message')
<div>
  
  <h1 class="text-center" style="padding-bottom: 15">
    {{$encontre}}
  </h1>

</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Notas</th>
      
    </tr>
  </thead>
  <tbody>
  	@foreach($pets as $document)
  		<tr>
  			<td>{{$document->name}}</td>
  			<td>{{$document->notes}}</td>

  		</tr>


  	@endforeach
  </tbody>


</table>
@endsection