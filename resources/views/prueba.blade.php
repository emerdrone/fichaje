@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   <html>
<body>
<script>var Geolocalizacion = navigator.geolocation || (window.google && google.gears && google.gears.factory.create('beta.geolocation'));
if (Geolocalizacion) Geolocalizacion.getCurrentPosition(MuestraLocalizacion, Excepciones);

function MuestraLocalizacion(posicion) {
alert(posicion.coords.latitude);
alert(posicion.coords.longitude);
alert(posicion.coords.accuracy);
}

function Excepciones(error) {
   switch (error.code) {
   case error.PERMISSION_DENIED:
      alert('Activa permisos de geolocalizacion');
      break;
   case error.POSITION_UNAVAILABLE:
      alert('Activa localizacion por GPS o Redes .');
      break;
   default:
      alert('ERROR: ' + error.code);
    }
  }</script>
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
