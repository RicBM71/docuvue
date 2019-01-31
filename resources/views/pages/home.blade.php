<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Metronic | Dashboard</title>
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

		

		<!--begin::Global Theme Styles -->
		<link href="/pages/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<link href="/adminmtr/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<link rel="shortcut icon" href="/pages/media/img/logo/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header " m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">

						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand m-brand--mobile">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="{{ route('pages.home') }}" class="m-brand__logo-wrapper">
										<img alt="" src="/adminmtr/img/logo/logo.png" />
									</a>
								</div>							
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
							<div class="m-stack m-stack--ver m-stack--desktop">
								<div class="m-stack__item m-stack__item--middle m-stack__item--fit">

									<!-- BEGIN: Aside Left Toggle -->
									

									<!-- END: Aside Left Toggle -->
								</div>
								<div class="m-stack__item m-stack__item--fluid">

									<!-- BEGIN: Horizontal Menu -->
									<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
									<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
										<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
											<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span
													 class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-analytics"></i><span class="m-menu__link-text">Dashboard</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
											</li>
											<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span
													 class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-notes"></i><span class="m-menu__link-text">Reports</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
											</li>												
											<li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span class="m-menu__item-here"></span><i
													 class="m-menu__link-icon flaticon-user"></i><span class="m-menu__link-text">Login</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>													
											</li>
										</ul>
									</div>

									<!-- END: Horizontal Menu -->
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--middle m-stack__item--right">

							<!-- BEGIN: Brand -->
							<a href="{{ route('pages.home') }}" class="m-brand m-brand--desktop">
								<img alt="" src="/adminmtr/img/logo/logoh.png" />
							</a>

							<!-- END: Brand -->
						</div>
					</div>
				</div>
			</header>

			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
						
						<!-- BEGIN: Subheader -->
						<div class="m-subheader ">
						</div>

						<!-- END: Subheader -->
						<div class="m-content">

						<!--begin::Portlet-->
						<div class="m-portlet">
							<div class="m-portlet__body m-portlet__body--no-padding">
								<div class="m-pricing-table-2">
									<div class="m-pricing-table-2__head">
										<div class="m-pricing-table-2__title m--font-light">
											<h1>Aplicaciones web para PYMES</h1>
										</div>
									
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m-pricing-table_content1" aria-expanded="true">
											<div class="m-pricing-table-2__content">
												<div class="m-pricing-table-2__container">
													<div class="m-pricing-table-2__items row">
														<div class="m-pricing-table-2__item col-lg-4">
															<div class="m-pricing-table-2__visual">
																<div class="m-pricing-table-2__hexagon"></div>
																<span class="m-pricing-table-2__icon m--font-info"><i class="fa flaticon-confetti"></i></span>
															</div>
															<h2 class="m-pricing-table-2__subtitle">ERP PYMES</h2>
															<div class="m-pricing-table-2__features">
																<p>Realizamos tu aplicación a la medida de tus necesidades, cuéntanos que necesitas y nos encargamos de todo el proyecto.</p>
																<span>Análisis y Desarrollo</span>
																<span>Framework Laravel</span>
																<span>Proyectos Terminados</span>
																<span>Desde</span>
															</div>
															<span class="m-pricing-table-2__price">999</span>
															<span class="m-pricing-table-2__label">€</span>
															
														</div>
														<div class="m-pricing-table-2__item col-lg-4">
															<div class="m-pricing-table-2__visual">
																<div class="m-pricing-table-2__hexagon"></div>
																<span class="m-pricing-table-2__icon m--font-info"><i class="fa  flaticon-rocket"></i></span>
															</div>
															<h2 class="m-pricing-table-2__subtitle">Alojamiento</h2>
															<div class="m-pricing-table-2__features">
																<p>Si no dispones de alojamiento, dominio o certificado nosotros te lo proporcionamos. Solo necesitarás tu Pc y tu conexión a Internet</p>
																<span>Servidor Administrado</span>
																<span>Backup diario</span>
																<span>Dominio propio</span>
																<span>Mensual</span>
															</div>
															<span class="m-pricing-table-2__price">100</span>
															<span class="m-pricing-table-2__label">€</span>
															
														</div>
														<div class="m-pricing-table-2__item col-lg-4">
															<div class="m-pricing-table-2__visual">
																<div class="m-pricing-table-2__hexagon"></div>
																<span class="m-pricing-table-2__icon m--font-info"><i class="flaticon-support"></i></span>
															</div>
															<h2 class="m-pricing-table-2__subtitle">Soporte</h2>
															<div class="m-pricing-table-2__features">
																<p>Cuando finalicemos tu proyecto nos encargamos del mantenimiento de tu aplicación. Incluidas actualizaciones y soporte telefónico, email...</p>
																<span>Atención telefónica</span>
																<span>Mantenmiento servidor</span>
																<span>Actualizaciones</span>
																<span>Mensual</span>
															</div>
															<span class="m-pricing-table-2__price">125</span>
															<span class="m-pricing-table-2__label">€</span>															
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					</div>
				</div>
			</div>

			<!-- end:: Body -->

			<!-- begin::Footer -->
			<footer class="m-grid__item  m-footer ">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; <a href="#" class="m-link"> Sanaval Tecnología</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">Nosotros</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">Política de Privacidad</span>
									</a>
								</li>																
								<li class="m-nav__item m-nav__item--last">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Soporte" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!--begin:: Global Mandatory Vendors -->
		{{-- <script src="../../vendors/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="../../vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../../vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="../../vendors/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="../../vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="../../vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="../../vendors/wnumb/wNumb.js" type="text/javascript"></script> --}}

		<!--end:: Global Mandatory Vendors -->

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle -->
		<script src="/pages/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>