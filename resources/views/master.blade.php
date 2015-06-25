<!DOCTYPE html>
<html>
<head>
	<title>Mazkara</title>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<style type="text/css">
	body { margin-top: 80px; }
</style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Mazkara</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Link <span class="sr-only"></span></a></li> -->
        <li><a href="{{ route('service.index') }}">Service</a></li>
        <li><a href="{{ route('pet.index') }}">Pet</a></li>
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if(\Sentry::check())
        <li><a href="{{ route('sentinel.profile.show') }}">Logged in as {{ \Sentry::getUser()->email }}</a></li>
        <li><a href="{{ route('sentinel.logout' )}}"> Logout? </a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">
@section('main')

@show
</div>


</body>
</html>