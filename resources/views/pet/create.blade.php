@extends('master')

@section('main')

<div class="row">

{!! Form::open(array('route' => 'pet.store')) !!}
<fieldset>

<!-- Form Name -->
<legend>Create a new Pet</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Pet Name</label>
  <div class="controls">
    <input name="pet" id="textinput" type="text" placeholder="Name" class="input-xlarge" required="">
    
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="selectmultiple">Select One / Multiple Services</label>
  <div class="controls">
    <select id="selectmultiple" name="services[]" class="input-xlarge" multiple="multiple">
    @foreach($services as $service)
      <option value="{{ $service->id }}">{{$service->name}}</option>
    @endforeach
    </select>
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