@extends('admin.layout')

@section('cabecera')

<h1>
        Todos los posts
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@stop

@section('contenido')
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Todos los posts</h3>
             <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Crear post</button>
            </div>

				 <div class="box-body">
				 	<table id="posts-table" class="table table-bordered table-striped">
				 		<thead>
				 			<tr>
				 				<th>ID</th>
				 				<th>Titulo</th>
				 				<th>Extracto</th>
				 				<th>Owner</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			@foreach ($posts as $post)
				 			<tr>
				 				<td>{{ $post->id }}</td>
				 				<td>{{ $post->titulo }}</td>
				 				<td>{{ $post->extracto }}</td>
				 				<td>{{ $post->owner->name }}</td>
				 				<td>
				 					<a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
				 					<a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
				 					<form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline;">
				 						@csrf @method('DELETE')
				 						<button class="btn btn-xs btn-danger" onclick="return confirm('¿Desea borrar el registro?')"><i class="fa fa-times"></i></button>
				 					</form>
				 					
				 				</td>
				 			</tr>
				 			@endforeach

				 		</tbody>                
				 	</table>
				 </div>
@stop



@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
	<!-- DataTables -->
	<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>	
	<script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	  $(function () {
	    
	    $('#posts-table').DataTable({
	      // "paging": true,
	      // "lengthChange": false,
	      // "searching": false,
	      // "ordering": true,
	      // "info": true,
	      // "autoWidth": false
	    });
	  });
	</script>
@endpush

