@extends('admin.layout')

@section('contenido')
<section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">No autorizado</h1>

			<h2>{{ $exception->getMessage() }}</h2>

			<a href="{{ url()->previous() }}">Regresar a página anterior</a>
		</div>
	</section>
	
@endsection