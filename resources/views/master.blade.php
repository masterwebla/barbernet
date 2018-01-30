<!DOCTYPE html>
<html>
<head>
  <title>Barbernet - @yield('titulo')</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
</head>
<body>
  
  @include('parciales.menu')
  @if(\Session::has('mensaje'))
	 @include('parciales.mensajes')
  @endif
  @yield('contenido')
  @include('parciales.footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/pinterest_grid.js') }}"></script>
  <script src="{{ asset('js/principal.js') }}"></script>
</body>
</html>