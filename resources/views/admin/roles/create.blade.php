@extends('admin.layout')
@section('subheader')
<div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Roles</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                  <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('admin.roles.index') }}" class="m-nav__link m-nav__link--icon">
                      <i class="m-nav__link-icon la la-home"></i>
                      Todos los roles
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
<div class="m-portlet">
  	<div class="m-portlet__head">
        <div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">Crear Role</h3>
				</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<form method="POST" action="{{ route('admin.roles.store') }}">
			@csrf 
			<div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
				<label for="name">Nombre</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control">
				{!! $errors->first('name', '<span class="form-control-feedback">:message</span>') !!}
			</div>
			<div class="form-group {{ $errors->has('guard_name') ? 'has-danger' : '' }}">
				<label for="guard_name">Guard</label>
				<select name="guard_name" class="form-control">
					@foreach (config('auth.guards') as $guardName => $guard)
						<option {{ old('guard_name') === $guardName ? 'selected' : '' }} value="{{ $guardName }}">{{ $guardName }}</option>
					@endforeach
			</select>						
			</div>
			
			<div class="form-group">
				<label>Permisos</label>
				@include('admin.permissions.checkboxes', ['model'=> $role])
			</div>
			
			
			<button class="btn btn-primary btn-block">Crear Role</button>
		</form>
	</div>
</div>		
</div>
	</div>

@endsection()