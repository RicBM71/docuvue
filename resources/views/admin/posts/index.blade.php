@extends('admin.layout')

@section('cabecera')
<h1>
        Todos los posts
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@stop

@section('contenido')
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Todos los posts</h3>
            </div>

				 <div class="box-body">
				 	<table id="posts-table" class="table table-bordered table-striped">
				 		<thead>
				 			<tr>
				 				<th>ID</th>
				 				<th>Titulo</th>
				 				<th>Extracto</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			@foreach ($posts as $post)
				 			<tr>
				 				<td>{{ $post->id }}</td>
				 				<td>{{ $post->titulo }}</td>
				 				<td>{{ $post->extracto }}</td>
				 				<td>
				 					<a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
				 					<a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
				 				</td>
				 			</tr>
				 			@endforeach

				 		</tbody>                
				 	</table>
				 </div>
@stop