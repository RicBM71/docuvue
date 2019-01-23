@extends('admin.layout')
@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Roles</h3>
				</div>
				<div class="box-body">
					<form method="POST" action="{{ route('admin.roles.store') }}">
						@csrf 
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Nombre</label>
							<input type="text" name="name" value="{{ old('name') }}" class="form-control">
							{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
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
						
						
						<button class="btn btn-primary btn-block">Crear</button>
					</form>
				</div>
			</div>		
		</div>
	</div>

@endsection()