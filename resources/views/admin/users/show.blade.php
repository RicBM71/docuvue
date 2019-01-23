@extends('admin.layout')

@section('contenido')

	<div class="row">
		<div class="col-md-3">
			<!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/adminlte/img/user4-128x128.jpg" alt="{{ $user->name }}">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">{{ $user->getRoleNames()->implode(',')}}</p>

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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Posts</h3>
				</div>
				<div class="box-body">
					@foreach ($user->posts as $post)
						<a href="{{ route('posts.show',$post) }}" target="_blank"><strong>{{ $post->titulo }}</strong><br/></a>												
						<small class="text-muted">Publicado {{ $post->fecha_publi->format('d/m/Y') }}</small>
						<p class="text-muted">{{ $post->extracto }}</p>
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

@endsection
