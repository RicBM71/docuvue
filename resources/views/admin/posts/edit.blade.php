@extends('admin.layout')
@section('cabecera')
<h1>
       Crear
        <small>Nueva publicación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
      </ol>
@stop
@section('contenido')
	@if ($post->fotos->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box box-body">
						<div class="row">
							@foreach ($post->fotos as $foto)		        			
							<form action="{{ route('admin.photos.destroy', $foto) }}" method="POST">

								@csrf	
								@method('DELETE')	        						        					

								<div class="col-md-2">	
									<button class="btn btn-danger btn-xs" style="position: absolute;">
										<i class="fa fa-remove"></i>
									</button>
									<img class="img-responsive" src="{{ url($foto->url) }}" alt="">
								</div>		        				
							</form>
							@endforeach
						</div>			
						
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="row">
		<form action="{{ route('admin.posts.update', $post) }}" method="POST">
			@csrf {{ method_field('PUT') }}
			<div class="col-md-8">			
			 	<div class="box box-primary">		        
		        	<div class="box-body">
		        		<div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
		        			<label>Título</label>
		        			<input type="text" class="form-control" 
		        					name="titulo" 
		        					placeholder="título"
		        					value = "{{ old('titulo', $post->titulo) }}">
		        			{!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}
		        		</div>
		        		<div class="form-group {{ $errors->has('cuerpo') ? 'has-error' : '' }}">
		        			<label>Contenido</label>
		        			<textarea id="editor" 
		        					rows="10" class="form-control" 
		        					name="cuerpo" 
		        					placeholder="Body del post">{{ old('cuerpo', $post->cuerpo) }}</textarea>
		        			{!! $errors->first('cuerpo', '<span class="help-block">:message</span>') !!}
		        		</div>		        		
		        	</div>		
			   	</div>
			</div>
			<div class="col-md-4">			
			 	<div class="box box-primary">
			 		<div class="box-body">
	        			<div class="form-group">
			                <label>Fecha</label>
			                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input name="fecha_publi" 
				                  	type="text" 
				                  	class="form-control pull-right" 
				                  	id="datepicker"
				                  	value = "{{ old('fecha_publi', $post->fecha_publi ? $post->fecha_publi->format('d/m/Y') : '') }}">
			           		</div>
			           	</div>
   		        		<div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
		        			<label>Categorías</label>
		        			<select name="categoria" class="form-control">
		        				<option value="">Selecciona</option>	
		        				@foreach ($categorias as $categoria)
		        					<option value="{{ $categoria->id }}"
		        							{{ old('categoria', $post->categoria_id) == $categoria->id ? 'selected' : '' }}
		        							>{{ $categoria->nombre }}</option>	
		        				@endforeach
		        			</select>	   
		        			{!! $errors->first('categoria', '<span class="help-block">:message</span>') !!}     				
	        			</div>
	        			<div class="form-group {{ $errors->has('etiquetas') ? 'has-error' : '' }}">
	        				<label>Etiquetas</label>	        				
                				<select name="etiquetas[]" class="form-control select2"                 					
                					multiple="multiple"
                					data-placeholder="Seleciona etiquetas"
                					style="width: 100%;">
                					@foreach ($etiquetas as $etiqueta)
                						<option {{ collect(old('etiquetas',$post->etiquetas->pluck('id')))->contains($etiqueta->id) ? 'selected' : '' }} value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                					@endforeach                  					
                  				</select>
                  				{!! $errors->first('etiquetas', '<span class="help-block">:message</span>') !!}   
	        			</div>

   		        		<div class="form-group {{ $errors->has('extracto') ? 'has-error' : '' }}">
		        			<label>Extracto</label>
		        			<textarea class="form-control" 
		        					name="extracto"
		        					placeholder="Extracto del post">{{ old('extracto', $post->extracto) }}</textarea>
		        			{!! $errors->first('extracto', '<span class="help-block">:message</span>') !!}   
	        			</div>
	        			<div class="form-group">
	        				<div class="dropzone">
	        					
	        				</div>
	        			</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Guardar</button>
						</div>
	        		</div>
				</div>
			</div>
		</form>

	</div>
	


@stop

@push('styles')
	<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
  	<!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endpush

@push('scripts')
	<!-- bootstrap datepicker -->
	
	<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
	<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
	<script src="/adminlte/plugins/select2/select2.full.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	
	<script>
		//Date picker
	    $('#datepicker').datepicker({
	    	language: 'es',
	      	autoclose: true,
	      	weekStart: 1,
	      	format: 'dd/mm/yyyy'      
	    });
	    CKEDITOR.replace('editor');
	    CKEDITOR.config.height= 315;

	    $('.select2').select2();

	    var myDropzone = new Dropzone('.dropzone', {
	    	url: '/admin/posts/{{ $post->id }}/photos', 
	    	acceptedFiles: 'image/*',
	    	maxFilesize: 2,
	    	maxFiles: 10,
	    	paramName: 'foto',
	    	headers: {
	    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	    	},
	    	dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
	    });

	    myDropzone.on('error', function(file, res){
	    	//console.log(res.errors.foto[0]);
	    	var msg = res.errors.foto[0];
	    	$('.dz-error-message:last > span').text(msg)

	    });

	    Dropzone.autoDiscover = false;
	</script>
@endpush


  