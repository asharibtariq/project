{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
  {{--<title>Project Monitoring</title>--}}
  {{--<meta charset="utf-8">--}}
  {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
  {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body style="background-image: url({{asset('img/login-background.png')}});--}}
        {{--background-repeat: no-repeat;--}}
        {{--background-attachment: fixed;--}}
        {{--background-size: cover;">--}}

    {{--<section class="vh-100">--}}
      {{--<div class="container py-5 h-100">--}}
        {{--<div class="row d-flex justify-content-center align-items-center h-100">--}}
          {{--<div class="col col-xl-10">--}}
            {{--<div class="card" style="border-radius: 1rem;">--}}
              {{--<div class="row g-0">--}}
                {{--<div class="col-md-6 col-lg-5 d-none d-md-block mt-5">--}}
                  {{--<img src="{{asset('img/login-box-image.png')}}"--}}
                       {{--alt="login form"--}}
                       {{--class="img-fluid"--}}
                       {{--style="border-radius: 1rem 0 0 1rem;" />--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-lg-7 d-flex align-items-center">--}}
                  {{--<div class="card-body p-4 p-lg-5 text-black">--}}

                    {{--<form method="POST" action="{{ route('login') }}">--}}
                      {{--@csrf--}}

                      {{--<h3 class="fw-normal pb-2" style="letter-spacing: 1px; text-align: center;">User {{ __('Login') }}</h3>--}}

                      {{--<div class="form-outline mb-4">--}}
                        {{--<input type="text" name="username" id="form2Example17" class="form-control form-control-lg  @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus />--}}
                        {{--<label class="form-label" for="form2Example17">{{ __('Username') }}</label>--}}

                        {{--@error('username')--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $message }}</strong>--}}
                        {{--</span>--}}
                        {{--@enderror--}}
                      {{--</div>--}}

                      {{--<div class="form-outline mb-4">--}}
                        {{--<input type="password" name="password" id="form2Example27" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="current-password" />--}}
                        {{--<label class="form-label" for="form2Example27">{{ __('Password') }}</label>--}}

                        {{--@error('password')--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $message }}</strong>--}}
                        {{--</span>--}}
                        {{--@enderror--}}

                      {{--</div>--}}

                      {{--<div class="form-check">--}}
                        {{--<input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>--}}
                        {{--<label class="form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>--}}
                      {{--</div>--}}

                      {{--<div class="pt-1 mb-4 mt-3">--}}
                        {{--<button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Sign In') }}</button>--}}
                      {{--</div>--}}

                      {{--@if (Route::has('password.request'))--}}
                        {{--<a class="small text-muted" href="{{ route('password.request') }}">--}}
                          {{--{{ __('Forgot Your Password?') }}--}}
                        {{--</a>--}}
                      {{--@endif--}}
                      <br>

                    {{--</form>--}}

                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</section>--}}

{{--</body>--}}
{{--</html>--}}


<!DOCTYPE html>
<html lang="en">

<head>

  <title>Project Monitoring</title>
  <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 11]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
  <meta name="author" content="Codedthemes" />

  <!-- Favicon icon -->
  {{--<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">--}}
  <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
  <!-- fontawesome icon -->
  {{--<link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">--}}
  <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/fontawesome-all.min.css')}}">
  <!-- animation css -->
  {{--<link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">--}}
  <link rel="stylesheet" href="{{asset('plugins/animation/css/animate.min.css')}}">

  <!-- vendor css -->
  {{--<link rel="stylesheet" href="../assets/css/style.css">--}}
  <link rel="stylesheet" href="{{asset('css/style.css')}}">




</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
  <div class="auth-content container">
    <div class="card">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="card-body">
            <h2>Project Monitoring System</h2>
            <h4 class="mb-3 f-w-400">Login into your account</h4>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-mail"></i></span>
              </div>
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="User Name"  value="{{ old('username') }}" required >
                @error('username')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
              </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-lock"></i></span>
              </div>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
              @enderror
            </div>

            <div class="form-group text-left mt-2">
              <div class="checkbox checkbox-info d-inline">
                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
              </div>
            </div>
            <button class="btn btn-info mb-4">Login</button>
              @if (Route::has('password.request'))
                <a class="small text-muted" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              @endif
            </form>
          </div>
        </div>
        <div class="col-md-6 d-none d-md-block">
          {{--<img src="../assets/images/auth-bg.jpg" alt="" class="img-fluid">--}}
          <img src="{{asset('images/auth-bg.jpg')}}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
{{--<script src="../assets/js/vendor-all.min.js"></script>--}}
<script src="{{asset('js/vendor-all.min.js')}}"></script>
{{--<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>--}}
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>


</body>

</html>
