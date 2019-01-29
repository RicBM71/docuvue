@extends('admin.layout')

@push('styles')
  <link href="/adminmtr/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@section('subheader')
<div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Usuarios</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                  <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('admin') }}" class="m-nav__link m-nav__link--icon">
                      <i class="m-nav__link-icon la la-home"></i>
                    </a>
                  </li>
                  {{-- <li class="m-nav__separator">-</li>
                  <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                      <span class="m-nav__link-text">DataTables</span>
                    </a>
                  </li>
                  <li class="m-nav__separator">-</li>
                  <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                      <span class="m-nav__link-text">Basic</span>
                    </a>
                  </li>
                  <li class="m-nav__separator">-</li>
                  <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                      <span class="m-nav__link-text">Basic Tables</span>
                    </a>
                  </li> --}}
                </ul>
              </div>
              <div>
              </div>
            </div>
</div>
@stop

@section('contenido')
 <!--begin: Datatable -->
    <div class="m-content">            
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
                  <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                      <button class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-toggle="modal" data-target="#exampleModal"><span>
                          <i class="la la-plus"></i>
                          <span>Nuevo Post</span>
                        </span></button>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                  </ul>
                </div>
              </div>
              <div class="m-portlet__body">
                <!--begin: Datatable -->
              <!--begin: Datatable -->
                <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12">
                  <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline collapsed" id="m_table_1" role="grid" aria-describedby="m_table_1_info" >
                  <thead>
                    <tr>
                      <th>Titulo</th>
                      <th>Extracto</th>
                      <th>Owner</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->extracto }}</td>
                    <td>{{ $post->owner->name }}</td>
                    <td>
                      <a href="{{ route('posts.show', $post) }}" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" target="_blank"><i class="fa fa-eye"></i></a>
                      <a href="{{ route('admin.posts.edit', $post) }}" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-edit"></i></a>
                      <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline;">
                        @csrf @method('DELETE')
                        <button class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" onclick="return confirm('¿Desea borrar el registro?')"><i class="la la-trash"></i></button>
                      </form>                 
                    </td>                    
                  </tr>
                  @endforeach                   
                </tbody>
                </table>

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
          </div>            
@include('admin.posts.create')          
@stop


@push('styles')
@endpush

@push('scripts')
    <!--begin::Page Vendors -->
    <script src="/adminmtr/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
  <script src="/adminmtr/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
    <script src="/adminmtr/js/pagination.js" type="text/javascript"></script>
    {{-- <script src="/adminmtr/datatable/datatable.js" type="text/javascript"></script> --}}
 {{-- <script>

     // if (window.location.hash == '#create'){    
        $('#exampleModal').modal('show');
     // }

      $('#exampleModal').on('hide.bs.modal', function(){
          //console.log(window.location.hash);
          window.location.hash = '#';
      });
    $('#exampleModal').on('shown.bs.modal', function(){
          window.location.hash = '#create';
          $('#titulo').focus();
      });
    </script> --}}
@endpush
