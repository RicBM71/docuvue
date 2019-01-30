@extends('admin.layout')
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
				<h3 class="m-portlet__head-text">Perfil usuario</h3>
				</div>
		</div>
	</div>
	<div class="m-portlet__body">

		<div class="row">
			<div class="col-md-3">				
				<div class="m-card-profile">
					<div class="m-card-profile__title m--hide">
						Perfil Usuario
					</div>
					<div class="m-card-profile__pic">
						<div class="m-card-profile__pic-wrapper">
							<img src="{{ url($user->avatar) }}" alt="{{ $user->name }}">
						</div>
					</div>
					<div class="m-card-profile__details">
						<span class="m-card-profile__name">{{ $user->name }}</span>
						<p class="text-muted text-center">{{ $user->getRoleNames()->implode(',')}}</p>
					</div>
				</div>							

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>e-mail</b> <a class="pull-right">{{ $user->email }}</a>
					</li>
					<li class="list-group-item">
						<b>Post</b> <a class="pull-right">{{ $user->posts->count() }}</a>
					</li>
					<li class="list-group-item">
						<b>Username</b> <a class="pull-right">{{ $user->username }}</a>
					</li>
				</ul>
				<a href="{{ route('admin.users.edit',$user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
			</div>
	              
	           
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Posts</h3>
					</div>
					<div class="box-body">
						@foreach ($user->posts as $post)
							<a href="{{ route('posts.show',$post) }}" target="_blank"><strong>{{ $post->titulo }}</strong><br/></a>												
							@if(is_null($post->fecha_publi))
								<small class="text-danger">No Publicado {{ optional($post->fecha_publi)->format('d/m/Y') }}</small>
								<p class="text-muted">{{ $post->extracto }}</p>
							@else							
								<small class="text-muted">Publicado {{ optional($post->fecha_publi)->format('d/m/Y') }}</small>
								<p class="text-muted">{{ $post->extracto }}</p>
							@endif
							@unless($loop->last)
								<hr>
							@endunless
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Roles</h3>
					</div>
					<div class="box-body">
						@foreach ($user->roles as $role)
							<strong>{{ $role->name }}</strong><br/>				
							<small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}</small>
							@unless($loop->last)
								<hr>
							@endunless
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Permisos Extra</h3>
					</div>
					<div class="box-body">
						@forelse($user->permissions as $permision)
							<strong>{{ $permision->name }}</strong><br/>			
							@unless($loop->last)
								<hr>
							@endunless
						@empty
							<small class="text-muted">No hay</small>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
