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

      <!--begin::Global Theme Styles -->
    <link href="/adminmtr/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="/adminmtr/assets/demo/media/img/logo/favicon.ico" />
  </head>

    <!-- begin::Body -->
  <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(/adminmtr/assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid  m-login__wrapper">
          <div class="m-login__container">
            <div class="m-login__logo">
              <a href="{{ route('pages.home') }}">
                <img src="/adminmtr/img/logo/logo.png">
              </a>
            </div>
            <div class="m-login__signin">
              <div class="m-login__head">
                <h3 class="m-login__title">Restablecer contraseña</h3>
              </div>
              

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                         <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group m-form__group has-danger">
                  <input class="form-control m-input" type="text" placeholder="e-mail" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                  <span class="form-control-feedback">{{ $errors->first('email') }}</span>
                </div>  
                <div class="form-group m-form__group has-danger">
                  <input class="form-control m-input" type="password" placeholder="password" name="password" required>
                  <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group m-form__group has-danger">
                  <input class="form-control m-input" type="password" placeholder="Confirmar password" name="password_confirmation" required>
                  <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                </div>              
                <div class="m-login__form-action">
                  <button type="submit" id="m_login_signin_submit" class="btn btn-primary">Enviar   </button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- end:: Page -->
  </body>
  <!-- end::Body -->
</html>
