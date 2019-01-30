@extends('admin.layout')

@section('cabecera')

<h1>
        Permisos
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Permisos</li>
      </ol>
@stop

@section('contenido')
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Permisos</h3>
             <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear Role</a>
            </div>

				 <div class="box-body">
				 	<table id="posts-table" class="table table-bordered table-striped">
				 		<thead>
				 			<tr>
				 				<th>ID</th>
				 				<th>Nombre</th>		
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			@foreach ($permissions as $permision)
				 			<tr>
				 				<td>{{ $permision->id }}</td>
				 				<td>{{ $permision->name }}</td>				 				
				 				<td>
				 					<a href="{{ route('admin.permissions.edit', $permision) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
				 					<form method="POST" action="{{ route('admin.permissions.destroy', $permision) }}" style="display: inline;">
				 						@csrf @method('DELETE')
				 						<button class="btn btn-xs btn-danger" onclick="return confirm('¿Desea borrar el permiso?')"><i class="fa fa-times"></i></button>
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

