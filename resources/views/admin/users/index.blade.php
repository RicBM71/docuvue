@extends('admin.layout')

@section('cabecera')

<h1>
        Todos los posts
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
@stop

@section('contenido')
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Todos los usuarios</h3>
              	@can('create', $users->first())
             		<a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear usuario</a>
             	@endcan
            </div>

				 <div class="box-body">
				 	<table id="posts-table" class="table table-bordered table-striped">
				 		<thead>
				 			<tr>
				 				<th>ID</th>
				 				<th>Nombre</th>				 				
				 				<th>Username</th>
				 				<th>e-mail</th>
				 				<th>Roles</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			@foreach ($users as $user)
				 			<tr>
				 				<td>{{ $user->id }}</td>
				 				<td>{{ $user->name }}</td>
				 				<td>{{ $user->username }}</td>
				 				<td>{{ $user->email }}</td>
				 				<td>{{ $user->getRoleNames()->implode(', ') }}</td>
				 				<td>
				 					@can('view', $user)
				 						<a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
				 					@endcan
				 					@can('update', $user)
				 						<a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
				 					@endcan
				 					@can('delete', $user)
				 						<form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline;">
				 							@csrf @method('DELETE')
				 							<button class="btn btn-xs btn-danger" onclick="return confirm('¿Desea borrar el registro?')"><i class="fa fa-times"></i></button>
				 						</form>
				 					@endcan
				 					
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

