@extends('admin.layout')
{{-- @section('subheader')
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
@stop --}}
@section('contenido')
	
	<div class="m-content">
						<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">Basic Example</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="m_select2_1" name="param">
												<option value="MD">Maryland</option>
												<option value="MA">Massachusetts</option>
												<option value="MI">Michigan</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NY">New York</option>
												<option value="NC">North Carolina</option>
												<option value="OH">Ohio</option>
												<option value="PA">Pennsylvania</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="VT">Vermont</option>
												<option value="VA">Virginia</option>
												<option value="WV">West Virginia</option>
											</select>
										</div>
									</div>									
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">Multi Select</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="m_select2_3" name="param" multiple="multiple">
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK" selected>Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV" selected>Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="MT" selected>Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NM">New Mexico</option>
													<option value="ND">North Dakota</option>
													<option value="UT">Utah</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="OK">Oklahoma</option>
													<option value="SD">South Dakota</option>
													<option value="TX">Texas</option>
													<option value="TN">Tennessee</option>
													<option value="WI">Wisconsin</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">													
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WV">West Virginia</option>
												</optgroup>
											</select>
										</div>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endpush

@push('scripts')
	<!-- bootstrap datepicker -->
	
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


  