@extends('admin.layout')

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Datos usuario</h3>
				</div>
				<div class="box-body">
					<form method="POST" action="{{ route('admin.users.update', $user) }}">
						@csrf @method('PUT')
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Nombre</label>
							<input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
							{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
							<label for="username">Usuario</label>
							<input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control">
							{!! $errors->first('username', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">email</label>
							<input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
							{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label for="password">Password</label>
							<input type="password" 
									name="password" 
									placeholder="Indicar contraseña" 
									class="form-control">
							{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
							<label for="password_confirmation">Repetir Password</label>
							<input type="password" 
									name="password_confirmation" 
									placeholder="Repetir contraseña" 
									class="form-control">
							<span class="help-block">No se modificará la contraseña si se deja en blanco</span>
						</div>

						<button class="btn btn-primary btn-block">Enviar</button>
					</form>
				</div>
			</div>		
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Roles</h3>
				</div>
				<div class="box-body">
					@role('Admin')
						<form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
							@csrf @method('PUT')
							
							@include('admin.roles.checkboxes')

							<button class="btn btn-primary btn-block">Actualizar Role</button>
						</form>
					@else
						<ul class="list-group">
							@forelse ($user->roles as $role)
								<li class="list-group-item">
									{{ $role->name }}
								</li>
							@empty
								<li class="list-group-item">No tiene roles</li>
							@endforelse
						</ul>
					@endrole
				</div>
			</div>
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Permisos</h3>
				</div>
				<div class="box-body">
					@role('Admin')
						<form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
							@csrf @method('PUT')
							
							@include('admin.permissions.checkboxes', ['model'=>$user])
							<button class="btn btn-primary btn-block">Actualizar Permiso</button>
						</form>
					@else
						<ul class="list-group">
							@forelse ($user->permissions as $permission)
								<li class="list-group-item">{{ $permission->name }}</li>
							@empty
								<li class="list-group-item">No tiene permisos</li>
							@endforelse
						</ul>
					@endrole
				</div>
			</div>
		</div>
	</div>
	

@endsection
