@extends('admin.layout')
@section('subheader')
<div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Posts</h3>
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
	<div class="row">
		<div class="col-md-12">			
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
		        					name="extracto"
		        					placeholder="Extracto del post">{{ old('extracto', $post->extracto) }}</textarea>
		        			{!! $errors->first('extracto', '<span class="form-control-feedback">:message</span>') !!}   
	        			</div>						
					</div>
					<div class="cold-md-4">				
					
						{{-- <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
		        			<label class="col-form-label col-lg-3 col-sm-12">Categorías</label>
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
	        			</div> --}}
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('cuerpo') ? 'has-danger' : '' }}">
		    				<label>Contenido</label>
		        			<textarea id="editor" 
		        					rows="10" class="form-control" 
		        					name="cuerpo" 
		        					placeholder="Body del post">{{ old('cuerpo', $post->cuerpo) }}</textarea>
		        			{!! $errors->first('cuerpo', '<span class="form-control-feedback">:message</span>') !!}
	        			</div>			        								
					</div>
				</div>
				<div class="row">
					<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-m-8 col-sm-12">Basic Example</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="m_select2_1" name="param">
												<option value="AK">Alaska</option>
												<option value="HI">Hawaii</option>
												<option value="WV">West Virginia</option>
											</select>
										</div>
									</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
				</div>
			</div>
		</div>

												
		</form>

	</div>
@stop

@push('styles')
	<!-- bootstrap datepicker -->
  <link href="/adminmtr/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  	<!-- Select2 -->
  <link href="/adminmtr/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/adminmtr/vendors/select2/dist/css/select2.min.css">
  	<!-- drop zone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endpush

@push('scripts')
	<!-- bootstrap datepicker -->
	
	{{-- <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script> --}}
	<script src="/adminmtr/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="/adminmtr/vendors/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script> 
	<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
	<script src="/adminmtr/vendors/select2/dist/js/select2.full.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	
	<script>
		// //Date picker
	         $('#m_datepicker_3, #m_datepicker_3_validate').datepicker({
            todayBtn: "linked",
            clearBtn: false,
            todayHighlight: true,
            autoclose: true,
            language: 'es',
            templates: {
            	leftArrow: '<i class="la la-angle-left"></i>',
            	rightArrow: '<i class="la la-angle-right"></i>'
            }
        });


	    // CKEDITOR.replace('editor');
	    // CKEDITOR.config.height= 315;

	    $('.m-select2').select2({
	    	// tags: true
	    });

	    // var myDropzone = new Dropzone('.dropzone', {
	    // 	url: '/admin/posts/{{ $post->id }}/photos', 
	    // 	acceptedFiles: 'image/*',
	    // 	maxFilesize: 2,
	    // 	maxFiles: 10,
	    // 	paramName: 'foto',
	    // 	headers: {
	    // 		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	    // 	},
	    // 	dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
	    // });

	    // myDropzone.on('error', function(file, res){
	    // 	//console.log(res.errors.foto[0]);
	    // 	var msg = res.errors.foto[0];
	    // 	$('.dz-error-message:last > span').text(msg)

	    // });

	    // Dropzone.autoDiscover = false;
	</script>
@endpush


  