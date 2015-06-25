@extends('master')

@section('main')
<div class="row">
	{!! Form::open(array('route' => 'service.store')) !!}
	<fieldset>

	<!-- Form Name -->
	<legend>Create a new Service</legend>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="textinput">Service Name</label>
	  <div class="controls">
	    <input name="service" id="textinput" type="text" placeholder="Name" class="input-xlarge" required="">
	    
	  </div>
	</div>

	<!-- Button -->
	<div class="control-group">
	  <label class="control-label" for="singlebutton">Submit</label>
	  <div class="controls">
	    <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
	  </div>
	</div>

	</fieldset>
	{!! Form::close() !!}	
</div>


@stop