@extends('admin.layout')

@section('cabecera')

<h1>
        Roles
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Roles</li>
      </ol>
@stop

@section('contenido')
          <div class="box box-primary">
            <div class="box-header">
              	<h3 class="box-title">Role</h3>
				@can('create', $roles->first())
             		<a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear Role</a>
             	@endcan
            </div>

				 <div class="box-body">
				 	<table id="posts-table" class="table table-bordered table-striped">
				 		<thead>
				 			<tr>
				 				<th>ID</th>
				 				<th>Nombre</th>				 				
				 				<th>Guard</th>				 				
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			@foreach ($roles as $role)
				 			<tr>
				 				<td>{{ $role->id }}</td>
				 				<td>{{ $role->name }}</td>
				 				<td>{{ $role->guard_name }}</td>
				 				<td>
				 					@can('update', $role)
					 					<a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
					 				@endcan
					 				@can('delete', $role)
					 					<form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline;">
					 						@csrf @method('DELETE')
					 						<button class="btn btn-xs btn-danger" onclick="return confirm('¿Desea borrar el role?')"><i class="fa fa-times"></i></button>
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

