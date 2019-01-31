<!DOCTYPE html>
<html lang="es">

  <!-- begin::Head -->
  <head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Login</title>
    <meta name="description" content="">
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
    
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
    <link href="/adminmtr/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="../../../assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="/adminmtr/assets/demo/media/img/logo/favicon.ico" />
  </head>

  <!-- end::Head -->

  <!-- begin::Body -->
  <!-- begin::Body -->
  <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(/adminmtr/assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid  m-login__wrapper">
          <div class="m-login__container">
            <div class="m-login__logo">
              <a href="#">
                <img src="/adminmtr/img/logo/logo.png">
              </a>
            </div>
            <div class="m-login__signin">
              <div class="m-login__head">
                <h3 class="m-login__title">Indentificación</h3>
              </div>
              <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="form-group m-form__group has-danger">
                  <input class="form-control m-input" type="text" placeholder="Usuario" name="username" value="{{ old('username') }}" autocomplete="off">
                  <span class="form-control-feedback">{{ $errors->first('username') }}</span>
                </div>
                <div class="form-group m-form__group has-danger">
                  <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                  <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                </div>
                <div class="row m-login__form-sub">
                  <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox m-checkbox--state-primary">
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                      <span></span>
                    </label>
                  </div>
                  <div class="col m--align-right m-login__form-right">
                    <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">Recordar Contraseña</a>
                  </div>
                </div>
                <div class="m-login__form-action">
                  <button type="submit" id="m_login_signin_submit" class="btn m-btn--pill m-btn--air  btn-primary btn-lg">Login</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- end:: Page -->

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
    <script src="/adminmtr/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="/adminmtr/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle -->
    <script src="/adminmtr/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts -->
    

    <!--end::Page Scripts -->
  </body>
  <!-- end::Body -->
</html>