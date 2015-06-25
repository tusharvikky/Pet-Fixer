@extends('master')

@section('main')

<div class="row">
	{!! Form::open(array('method' => 'put', 'route' => ['service.update', $service->id])) !!}
		<fieldset>
		<!-- Form Name -->
		<legend>Add a Service to a Pet</legend>

		<!-- Select Basic -->
		<div class="control-group">
		  <label class="control-label" for="selectbasic">Select Service</label>
		  <div class="controls">
<!-- 		    <select id="selectbasic" name="service" class="input-xlarge">

		      <option>Option one</option>
		      <option>Option two</option>
		    </select> -->
		    Service : {{ $service->service }}
		  </div>
		</div>

		<!-- Select Multiple -->
		<div class="control-group">
		  <label class="control-label" for="selectmultiple">Select One / Multiple Pets</label>
		  <div class="controls">
		    <select id="selectmultiple" name="pets[]" class="input-xlarge" multiple="multiple">
		    @foreach($pets as $pet)
		      <option value="{{ $pet->id }}">{{$pet->pet}}</option>
		    @endforeach
		    </select>
		  </div>
		</div>

		<!-- Button -->
		<div class="control-group">
		  <label class="control-label" for="singlebutton">Single Button</label>
		  <div class="controls">
		    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
		  </div>
		</div>

		</fieldset>
	{!! Form::close() !!}
</div>


@stop
