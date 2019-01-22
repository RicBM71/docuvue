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
					<form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
						@csrf @method('PUT')
						
						@foreach ($roles as $id => $name)
							<div class="checkbox">
								<label>
									<input name="roles[]" type="checkbox" value="{{ $name }}" {{ $user->roles->contains($id) ? 'checked' : '' }}>{{ $name }}
								</label>
							</div>						
						@endforeach
						<button class="btn btn-primary btn-block">Actualizar Role</button>
					</form>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Permisos</h3>
				</div>
				<div class="box-body">
					<form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
						@csrf @method('PUT')
						
						@foreach ($permisos as $id => $name)
							<div class="checkbox">
								<label>
									<input name="permissions[]" type="checkbox" value="{{ $name }}" {{ $user->permissions->contains($id) ? 'checked' : '' }}>{{ $name }}
								</label>
							</div>						
						@endforeach
						<button class="btn btn-primary btn-block">Actualizar Permiso</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	

@endsection
