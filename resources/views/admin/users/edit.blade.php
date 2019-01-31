@extends('admin.layout')
@section('urlback')
<a href="{{ route('admin.users.index') }}" class="m-nav__link m-dropdown__toggle">										
	<span class="m-nav__link-icon"><i class="flaticon-home"></i></span>
</a>
@stop
@section('subheader')
{{-- <div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Usuarios</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                  <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('admin.users.index') }}" class="m-nav__link m-nav__link--icon">
                      <i class="m-nav__link-icon la la-home"></i>
                    </a>
                  </li>        
                </ul>
              </div>
              <div>
              </div>
            </div>
</div> --}}
@stop
@section('contenido')
<div class="row">
	<div class="col-md-6">
		<div class="m-portlet">
          	<div class="m-portlet__head">
	            <div class="m-portlet__head-caption">
    				<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">Editar usuario</h3>
      				</div>
    			</div>
			</div>
			<div class="m-portlet__body">
				<form method="POST" action="{{ route('admin.users.update', $user) }}">
					@csrf @method('PUT')
					<div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
						<label for="name">Nombre</label>
						<input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
						{!! $errors->first('name', '<span class="form-control-feedback">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }}">
						<label for="username">Usuario</label>
						<input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control">
						{!! $errors->first('username', '<span class="form-control-feedback">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
						<label for="email">email</label>
						<input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
						{!! $errors->first('email', '<span class="form-control-feedback">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
						<label for="password">Password</label>
						<input type="password" 
								name="password" 
								placeholder="Indicar contraseña" 
								class="form-control">
						{!! $errors->first('password', '<span class="form-control-feedback">:message</span>') !!}
					</div>
					<div class="form-group">
						<label for="password_confirmation">Repetir Password</label>
						<input type="password" 
								name="password_confirmation" 
								placeholder="Repetir contraseña" 
								class="form-control">
						<span class="form-control-feedback">No se modificará la contraseña si se deja en blanco</span>
					</div>
					@if($user->avatar === '#')
						<div class="form-group">
	        				<div class="dropzone"></div>
		        		</div>		
		        	@endif
					<button class="btn btn-primary btn-block">Enviar</button>
				</form>
				<br>
				@if($user->avatar !== '#')
					<form action="{{ route('admin.avatar.destroy', $user) }}" method="POST">

						@csrf	
						@method('DELETE')

						<button class="btn btn-danger btn-sm" style="position: absolute; margin:4px;" onclick="return confirm('¿Desea borrar el avatar?')">
							<i class="la la-trash"></i>
						</button>
						<div class="m-card-profile__pic">
							<div class="m-card-profile__pic-wrapper">
								<img class="img-fluid" src="{{ url($user->avatar) }}" alt="">
							</div>
						</div>
					</form>
				@endif
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="m-portlet">
          	<div class="m-portlet__head">
	            <div class="m-portlet__head-caption">
    				<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">Editar Role</h3>
      				</div>
    			</div>
			</div>
			<div class="m-portlet__body">
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
		<div class="m-portlet">
          	<div class="m-portlet__head">
	            <div class="m-portlet__head-caption">
    				<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">Editar Permisos</h3>
      				</div>
    			</div>
			</div>
			<div class="m-portlet__body">
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
@push('styles')	
  <link href="/adminmtr/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="/adminmtr/vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
	
	<script>
		@if($user->avatar === '#')
		    var myDropzone = new Dropzone('.dropzone', {
		    	url: '/admin/users/{{ $user->id }}/avatar', 
		    	acceptedFiles: 'image/*',
		    	maxFilesize: 2,
		    	maxFiles: 1,
		    	resizeWidth: 80,
		    	resizeHeight: 80,
		    	paramName: 'avatar',
		    	headers: {
		    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
		    	},
		    	dictDefaultMessage: 'Arrastra la foto aquí para subir avatar'
		    });

		    myDropzone.on('error', function(file, res){
		    	// console.log(res.errors.foto[0]);
		    	var msg = res.errors.foto[0];
		    	$('.dz-error-message:last > span').text(msg)

		    });

		    Dropzone.autoDiscover = false;
		  @endif
	</script>
@endpush