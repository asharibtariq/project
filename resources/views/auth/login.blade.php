<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project Monitoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body style="background-image: url({{asset('img/login-background.png')}});
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;">

    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block mt-5">
                  <img src="{{asset('img/login-box-image.png')}}"
                       alt="login form"
                       class="img-fluid"
                       style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form method="POST" action="{{ route('login') }}">
                      @csrf

                      <h3 class="fw-normal pb-2" style="letter-spacing: 1px; text-align: center;">User {{ __('Login') }}</h3>

                      <div class="form-outline mb-4">
                        <input type="text" name="username" id="form2Example17" class="form-control form-control-lg  @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus />
                        <label class="form-label" for="form2Example17">{{ __('Username') }}</label>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example27" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="current-password" />
                        <label class="form-label" for="form2Example27">{{ __('Password') }}</label>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                      </div>

                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>
                      </div>

                      <div class="pt-1 mb-4 mt-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Sign In') }}</button>
                      </div>

                      @if (Route::has('password.request'))
                        <a class="small text-muted" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                        </a>
                      @endif
                      <br>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>
