@extends('master')


@section('main')
<a href="{{ route('pet.create')}}" class="btn btn-primary btn-mini"> Add a new Pet </a>
<div class="bs-example" data-example-id="condensed-table">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>User ID</th>
          <th>Pet</th>
          <th>Services</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($pets as $pet)
        <tr>
          <th scope="row">{{ $pet->id }}</th>
          <td>{{ $pet->userId }}</td>
          <td>{{ $pet->name }}</td>
          <td>{{ $pet->services->name }}</td>
          <td>
			    {!! Form::open(array('route' => array('pet.destroy', $pet->id), 'method' => 'delete')) !!}
			        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
			    {!! Form::close() !!}          	    	
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@stop