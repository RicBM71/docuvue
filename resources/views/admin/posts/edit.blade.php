@extends('admin.layout')
@section('urlback')
<a href="{{ route('admin.posts.index') }}" class="m-nav__link m-dropdown__toggle">										
	<span class="m-nav__link-icon"><i class="flaticon-home"></i></span>
</a>
{{-- <a href="{{ route('admin.posts.index') }}" class="m-menu__link m-menu__toggle">
	
	<span class="m-menu__link-text"><i class="m-menu__link-icon flaticon-speech-bubble"></i>Postqs</span>
</a> --}}
@stop
@section('contenido')
	
			<div class="m-portlet">
	              	<div class="m-portlet__head">
			            <div class="m-portlet__head-caption">
	        				<div class="m-portlet__head-title">
	            				<h3 class="m-portlet__head-text">Editar Post</h3>
	          				</div>
	        			</div>
					</div>
			<div class="m-portlet__body">	
				<form action="{{ route('admin.posts.update', $post) }}" method="POST">
					@csrf {{ method_field('PUT') }}	
				<div class="row">
						<div class="col-md-8">
							<div class="form-group {{ $errors->has('titulo') ? 'has-danger' : '' }}">
		    				<label class="col-2 col-form-label">Título</label>
		    				<input type="text" class="form-control" 
		    					name="titulo" 
		    					placeholder="título"
		    					value = "{{ old('titulo', $post->titulo) }}">
			    				{!! $errors->first('titulo', '<span class="form-control-feedback">:message</span>') !!}
	        				</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-form-label col-lg-3 col-sm-12">Fecha</label>
								<div>
									<div class="input-group date">
										<input name="fecha_publi" 
						                  	type="text" 
						                  	 class="form-control m-input"
						                  	id="m_datepicker_3"
						                  	value = "{{ old('fecha_publi', $post->fecha_publi ? $post->fecha_publi->format('d/m/Y') : '') }}">
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar"></i>
											</span>
										</div>
									</div>
								</div>
							</div>														
						</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('extracto') ? 'has-danger' : '' }}">
		        			<label>Extracto</label>
		        			<textarea class="form-control" 
		        					rows="6" 
		        					name="extracto"
		        					placeholder="Extracto del post">{{ old('extracto', $post->extracto) }}</textarea>
		        			{!! $errors->first('extracto', '<span class="form-control-feedback">:message</span>') !!}   
	        			</div>						
					</div>
					<div class="col-md-4">						
						<div class="form-group {{ $errors->has('categoria_id') ? 'has-danger' : '' }}">
		        			<label class="col-form-label col-lg-6 col-sm-12">Categorías</label>
		        			<div>
		        			<select name="categoria_id" class="form-control m-select2">
		        				
		        				@foreach ($categorias as $categoria)
		        					<option value="{{ $categoria->id }}"
		        							{{ old('categoria_id', $post->categoria_id) == $categoria->id ? 'selected' : '' }}
		        							>{{ $categoria->nombre }}</option>	
		        				@endforeach
		        			</select>	   
		        			{!! $errors->first('categoria_id', '<span class="help-block">:message</span>') !!}     				
		        			</div>
	        			</div>
	        			<div class="form-group {{ $errors->has('etiquetas') ? 'has-danger' : '' }}">
	        				<label class="col-form-label col-lg-6 col-sm-12">Etiquetas</label>	        				
                				<select name="etiquetas[]" class="form-control m-select2"                 					
                					multiple="multiple"
                					data-placeholder="Seleciona etiquetas"
                					style="width: 100%;">
                					@foreach ($etiquetas as $etiqueta)
                						<option {{ collect(old('etiquetas',$post->etiquetas->pluck('id')))->contains($etiqueta->id) ? 'selected' : '' }} value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                					@endforeach                  					
                  				</select>
                  				{!! $errors->first('etiquetas', '<span class="form-control-feedback">:message</span>') !!}   
	        			</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('cuerpo') ? 'has-danger' : '' }}">
		    				<label>Contenido</label>
		        			<textarea id="editor" 
		        					rows="4" class="form-control" 
		        					name="cuerpo" 
		        					placeholder="Body del post">{{ old('cuerpo', $post->cuerpo) }}</textarea>
		        			{!! $errors->first('cuerpo', '<span class="form-control-feedback">:message</span>') !!}
	        			</div>			        								
					</div>
					<div class="col-md-4">
						<div class="form-group">
	        				<div class="dropzone">	        					
	        				</div>
	        			</div>							
					</div>
				</div>				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
				</div>
			</div>
		</div>
		</form>
		@if ($post->fotos->count() > 0)
		<div class="row">
			<div class="col-12">
				<div class="row">
					@foreach ($post->fotos as $foto)		        			
						<div class="col-2">	
							<form action="{{ route('admin.photos.destroy', $foto) }}" method="POST">

								@csrf	
								@method('DELETE')

								<button class="btn btn-danger btn-sm" style="position: absolute; margin:4px;">
									<i class="la la-trash"></i>
								</button>
								<img class="img-fluid" src="{{ url($foto->url) }}" alt="">
							</form>		
						</div>		        									
					@endforeach
				</div>			
			</div>
		</div>
	@endif
	</div>

</div>

@stop

@push('styles')
	<!-- bootstrap datepicker -->
  <link href="/adminmtr/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  	<!-- Select2 -->
  <link href="/adminmtr/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/adminmtr/vendors/select2/dist/css/select2.min.css">
  	<!-- drop zone -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"> --}}
  <link href="/adminmtr/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<!-- bootstrap datepicker -->
	
	<script src="/adminmtr/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="/adminmtr/vendors/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script> 
	<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
	<script src="/adminmtr/vendors/select2/dist/js/select2.full.min.js"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}
	<script src="/adminmtr/vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
	
	<script>
		// //Date picker
	         $('#m_datepicker_3, #m_datepicker_3_validate').datepicker({
            todayBtn: "linked",
            clearBtn: false,
            todayHighlight: true,
            orientation: "bottom left",
            autoclose: true,
            language: 'es',
            templates: {
            	leftArrow: '<i class="la la-angle-left"></i>',
            	rightArrow: '<i class="la la-angle-right"></i>'
            }
        });


	    CKEDITOR.replace('editor');
	    CKEDITOR.config.height= 315;

	    $('.m-select2').select2({
	    	tags: true
	    });

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


  