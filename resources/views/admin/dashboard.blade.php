@extends('admin.layout')

@section('contenido')
	<h1>Dash</h1>
	<p>Hol@ {{ auth()->user()->name }} </p>	
	<a href="/">Inicio</a>
@stop