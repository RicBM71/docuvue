<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>{{ config('app.name') }} | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

		<!--end::Web font -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="/adminmtr/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		{{-- <link href="/adminmtr/vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" /> --}}
		<link href="/adminmtr/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
		{{-- <link href="/adminmtr/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" /> 
		<link href="/adminmtr/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />  --}}
		{{-- <link href="/adminmtr/vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" /> --}}
		<link href="/adminmtr/vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
		<link href="/adminmtr/vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->
		@stack('styles')
		<!--begin::Global Theme Styles -->
		<link href="/adminmtr/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="/adminmtr/assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
{{-- 		<link href="/adminmtr/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
 --}}
		<!--RTL version:<link href="/adminmtr/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="/adminmtr/assets/demo/media/img/logo/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			@include('admin.partials.header')

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

					<!-- BEGIN: Aside Menu -->
					@include('admin.partials.nav')

					<!-- END: Aside Menu -->
				</div>

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					@yield('subheader')

					<!-- END: Subheader -->
					<div class="m-content">
						@if (session()->has('flash'))
							<div class="alert alert-success">{{ session('flash') }}</div>
						@endif
						@yield('contenido')
					</div>
				</div>
			</div>

			<!-- end:: Body -->

			<!-- begin::Footer -->
	

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Sidebar -->


		<!-- end::Quick Sidebar -->

		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end::Scroll Top -->

		<!-- begin::Quick Nav -->
	

		<!-- begin::Quick Nav -->

		<!--begin:: Global Mandatory Vendors -->
		<script src="/adminmtr/vendors/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/wnumb/wNumb.js" type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
	{{-- 	<script src="/adminmtr/vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/jstree/dist/jstree.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/raphael/raphael.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/morris.js/morris.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/chartist/dist/chartist.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
		<script src="/adminmtr/vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script> --}}

		<!--end:: Global Optional Vendors -->
			
		<!--begin::Global Theme Bundle -->
		<script src="/adminmtr/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
		<script src="/adminmtr/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="/adminmtr/assets/app/js/dashboard.js" type="text/javascript"></script>

		@stack('scripts')

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>