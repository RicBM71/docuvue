@extends('admin.layout')

@section('subheader')
@stop

@section('contenido')
 <!--begin: Datatable -->
            <div class="m-portlet m-portlet--mobile">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      Usuarios
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                  <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                      <a href="{{ route('admin.users.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                        <span>
                          <i class="la la-plus"></i>
                          <span>Nuevo Usuario</span>
                        </span>
                      </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                  </ul>
                </div>
              </div>
              <div class="m-portlet__body">
                <!--begin: Datatable -->
              <!--begin: Datatable -->
                <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12">
                  <table class="table table-sm table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline collapsed" id="m_table_1" role="grid" aria-describedby="m_table_1_info" >
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
                          <a href="{{ route('admin.users.show', $user) }}" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-eye"></i></a>
                          @endcan
                          @can('update', $user)
                          <a href="{{ route('admin.users.edit', $user) }}" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-edit"></i></a>
                          @endcan
                          @can('delete', $user)
                            @if($user->id !== 1)
                              <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline;">
                                @csrf @method('DELETE')
                                <button class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" onclick="return confirm('¿Desea borrar el registro?')"><i class="la la-trash"></i></button>
                              </form>
                            @endif
                          @endcan
                          
                        </td>
                      </tr>
                      @endforeach                   
                    </tbody>
              </table>                  

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
@stop


@push('styles')
  <link href="/adminmtr/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!--begin::Page Vendors -->

    <script src="/adminmtr/assets/vendors/custom/datatables/datatables.bundle.min.js" type="text/javascript"></script>
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
    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
   
   {{--  <script src="/adminmtr/datatable/datatable.js" type="text/javascript"></script> --}}

@endpush