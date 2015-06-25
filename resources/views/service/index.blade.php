@extends('master')


@section('main')
<a href="{{ route('service.create')}}" class="btn btn-primary btn-mini"> Add a new Service </a>
<div class="bs-example" data-example-id="condensed-table">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>User ID</th>
          <th>Service</th>
          <th>Pets</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($services as $service)
        <tr>
          <th scope="row">{{ $service->id }}</th>
          <td>{{ $service->userId }}</td>
          <td>{{ $service->name }}</td>
          <td>
            @foreach($service->pets as $pet)
              {{ $pet->name }} | 
            @endforeach
          </td>
          <td>
			    {!! Form::open(array('route' => array('service.destroy', $service->id), 'method' => 'delete')) !!}
			        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
			    {!! Form::close() !!}  

              <!-- <a href="{{ route('service.edit', $service->id ) }}" class="btn btn-primary btn-mini">Edit</a>        	    	 -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@stop