@extends('admin.layout')
@section('urlback')
<a href="{{ route('admin.users.index') }}" class="m-nav__link m-dropdown__toggle">										
	<span class="m-nav__link-icon"><i class="flaticon-home"></i></span>
</a>
@stop
@section('contenido')
<div class="m-portlet m-portlet--mobile">
	
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      Crear usuario
                    </h3>
                  </div>
                </div>
               
              </div>
              <div class="m-portlet__body">
              	<form method="POST" action="{{ route('admin.users.store') }}">
	              	<div class="row">              		
						<div class="col-md-6">						
							@csrf 

							<div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
								<label for="name">Nombre</label>
								<input type="text" name="name" value="{{ old('name') }}" class="form-control">
								{!! $errors->first('name', '<span class="form-control-feedback">:message</span>') !!}
							</div>
							<div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }}">
								<label for="username">Usuario</label>
								<input type="text" name="username" value="{{ old('username') }}" class="form-control">
								{!! $errors->first('username', '<span class="form-control-feedback">:message</span>') !!}
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
								<label for="email">email</label>
								<input type="text" name="email" value="{{ old('email') }}" class="form-control">
								{!! $errors->first('email', '<span class="form-control-feedback">:message</span>') !!}
							</div>
							<button class="btn btn-primary btn-block">Crear</button>
			            </div>
			            <div class="col-md-6">
			            	
							<div class="form-group m-form__group">
								<label class="form-control-label">Roles</label>									
								@include('admin.roles.checkboxes')
							</div>
							<div class="form-group m-form__group">
								<label class="form-control-label">Permisos</label>									
								@include('admin.permissions.checkboxes', ['model' => $user])
							</div>											
						</div>
					</div>
				</form>
			</div>
		</div>

@endsection()