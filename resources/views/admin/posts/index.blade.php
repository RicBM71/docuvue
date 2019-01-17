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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="{{ route('admin.posts.store') }}" method="POST">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
						<label>Título</label>
						<input type="text" class="form-control" 
						name="titulo" 
						placeholder="título"
						value = {{ old('titulo') }}>
						{!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>
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

