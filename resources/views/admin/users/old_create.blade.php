@extends('admin.layout')
@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Datos usuario</h3>
				</div>
				<div class="box-body">
					<form method="POST" action="{{ route('admin.users.store') }}">
						@csrf 
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Nombre</label>
							<input type="text" name="name" value="{{ old('name') }}" class="form-control">
							{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
							<label for="username">Usuario</label>
							<input type="text" name="username" value="{{ old('username') }}" class="form-control">
							{!! $errors->first('username', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">email</label>
							<input type="text" name="email" value="{{ old('email') }}" class="form-control">
							{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
							<label>Roles</label>
							@include('admin.roles.checkboxes')
						</div>
						<div class="form-group">
							<label>Permisos</label>
							@include('admin.permissions.checkboxes', ['model' => $user])
						</div>
						
						
						<button class="btn btn-primary btn-block">Crear</button>
					</form>
				</div>
			</div>		
		</div>
	</div>

@endsection()