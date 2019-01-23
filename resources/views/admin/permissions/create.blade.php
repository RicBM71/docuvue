@extends('admin.layout')
@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Permisos</h3>
				</div>
				<div class="box-body">
					<form method="POST" action="{{ route('admin.permissions.store', $permission) }}">
						@csrf 
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Nombre</label>
							<input type="text" name="name" value="{{ old('name', $permission->name) }}" class="form-control">
							{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
						</div>
						<button class="btn btn-primary btn-block">Crear</button>
					</form>
				</div>
			</div>		
		</div>
	</div>

@endsection()