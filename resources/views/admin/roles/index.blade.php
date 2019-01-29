@extends('admin.layout')

@push('styles')
  <link href="/adminmtr/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@section('subheader')
<div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Roles</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                  <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('admin.roles.index')}}" class="m-nav__link m-nav__link--icon">
                      <i class="m-nav__link-icon la la-home"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div>
              </div>
            </div>
</div>
@stop

@section('contenido')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Listado
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			@can('create', $roles->first())
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="{{ route('admin.roles.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span>Nuevo Role</span>
						</span>
					</a>
				</li>
				<li class="m-portlet__nav-item"></li>
			</ul>
			@endcan
		</div>
	</div>
  	<div class="m-portlet__body">
     <!--begin: Datatable -->
		<div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">     
			<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline collapsed" id="m_table_1" role="grid" aria-describedby="m_table_1_info" >
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
			 					<a href="{{ route('admin.roles.edit', $role) }}" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-edit"></i></a>
			 				@endcan
			 				@can('delete', $role)
			 					<form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline;">
			 						@csrf @method('DELETE')
			 						<button class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" onclick="return confirm('¿Desea borrar el role?')"><i class="la la-trash"></i></button>
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
@endpush

@push('scripts')
    <!--begin::Page Vendors -->
    <script src="/adminmtr/assets/vendors/custom/datatables/datatables.bundle.min.js" type="text/javascript"></script>
 
    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->    
 <script>

    $('#m_table_1').dataTable( {
          responsive: true,
          pagingType: 'full_numbers',
          info: false,
          paging: true,    
          lengthChange: false,
          pageLength: 10,      
          language: {
            "url": "/adminmtr/js/datatable.Spanish.lang"
            }
      });

    </script>
@endpush