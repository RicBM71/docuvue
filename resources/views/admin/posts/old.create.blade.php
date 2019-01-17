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
	<div class="row">
		<form action="{{ route('admin.posts.store') }}" method="POST">
			@csrf
			<div class="col-md-8">			
			 	<div class="box box-primary">		        
			        	<div class="box-body">
			        		<div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
			        			<label>Título</label>
			        			<input type="text" class="form-control" 
			        					name="titulo" 
			        					placeholder="título"
			        					value = {{ old('titulo') }}>
			        			{!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}
			        			
			        		</div>
			        		<div class="form-group {{ $errors->has('cuerpo') ? 'has-error' : '' }}">
			        			<label>Contenido</label>
			        			<textarea id="editor" 
			        					rows="10" class="form-control" 
			        					name="cuerpo" 
			        					placeholder="Body del post">{{ old('cuerpo') }}</textarea>
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
			                  	value = "{{ old('fecha_publi') }}">
			            </div>
   		        		<div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
		        			<label>Categorías</label>
		        			<select name="categoria" class="form-control">
		        				<option value="">Selecciona</option>	
		        				@foreach ($categorias as $categoria)
		        					<option value="{{ $categoria->id }}"
		        							{{ old('categoria') == $categoria->id ? 'selected' : '' }}
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
                						<option {{ collect(old('etiquetas'))->contains($etiqueta->id) ? 'selected' : '' }} value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                					@endforeach                  					
                  				</select>
                  				{!! $errors->first('etiquetas', '<span class="help-block">:message</span>') !!}   
	        				</div>

   		        		<div class="form-group {{ $errors->has('extracto') ? 'has-error' : '' }}">
		        			<label>Extracto</label>
		        			<textarea class="form-control" 
		        					name="extracto"
		        					placeholder="Extracto del post">{{ old('extracto') }}</textarea>
		        			{!! $errors->first('extracto', '<span class="help-block">:message</span>') !!}   
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
@endpush

@push('scripts')
	<!-- bootstrap datepicker -->
	<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
	<script src="/adminlte/plugins/select2/select2.full.min.js"></script>
	<script>
		//Date picker
	    $('#datepicker').datepicker({
	      autoclose: true
	    });
	    CKEDITOR.replace('editor');

	    $('.select2').select2();
	</script>
@endpush


  