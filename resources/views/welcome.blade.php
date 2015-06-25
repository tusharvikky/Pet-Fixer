@extends('master')

@section('main')


<div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="auth login"><a class="" href="{{ route('sentinel.login') }}">Login</a></div>
            <div class="auth"><a href="{{ route('sentinel.register.form') }}">Register</a></div>   
    </div>
</div>
@stop