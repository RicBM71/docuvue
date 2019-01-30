@extends('admin.layout')
@section('urlback')
<a href="{{ route('admin.roles.index') }}" class="m-nav__link m-dropdown__toggle">										
	<span class="m-nav__link-icon"><i class="flaticon-home"></i></span>
</a>
@stop
@section('contenido')
<div class="m-portlet">
  	<div class="m-portlet__head">
        <div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">Editar Role</h3>
				</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<form method="POST" action="{{ route('admin.roles.update', $role) }}">
			@csrf  @method('PUT')
			<div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
				<label for="name">Nombre</label>
				<input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control">
				{!! $errors->first('name', '<span class="form-control-feedback">:message</span>') !!}
			</div>
			<div class="form-group {{ $errors->has('guard_name') ? 'has-danger' : '' }}">
				<label for="guard_name">Guard</label>
				<select name="guard_name" class="form-control">
					@foreach (config('auth.guards') as $guardName => $guard)
						<option {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }} value="{{ $guardName }}">{{ $guardName }}</option>
					@endforeach
			</select>						
			</div>
			
			<div class="form-group">
				<label>Permisos</label>
				@include('admin.permissions.checkboxes', ['model'=> $role])
			</div>
			<button class="btn btn-primary btn-block">Enviar</button>			
		</form>
	</div>
</div>

@endsection()