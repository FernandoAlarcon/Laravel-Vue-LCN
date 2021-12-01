@include('header')
@include('navbar')
<div class="section"> 
      <div class="section section-signup" style="background-image: url('assets/img/calculate.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
        <div class="container">
          <div class="row">
            <div class="card card-signup" data-background-color="orange">

              <form method="POST" class="form" action="{{ route('login') }}">
                @csrf

                <div class="card-header text-center">
                  <h3 class="card-title title-up">Incia Session</h3>
                  <!-- <div class="social-line">
                    <a href="#pablo" class="btn btn-neutral btn-facebook btn-icon btn-round">
                      <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-neutral btn-twitter btn-icon btn-lg btn-round">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-neutral btn-google btn-icon btn-round">
                      <i class="fab fa-google-plus"></i>
                    </a>
                  </div> -->
                </div>
                <div class="card-body">
                  <div class="input-group no-border">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i> 
                      </span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div> 
                  <div class="input-group no-border">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons ui-1_email-85"></i>
                      </span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                  </div>

                  <!-- <div class="form-group row">
                      <div class="col-md-6 offset-md-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                              </label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                  </div>  -->

                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-neutral btn-round btn-lg">
                      Entrar
                  </button>
                </div>
              </form>

            </div>
          </div>
          <!-- <div class="col text-center">
            <a href="examples/login-page.html" class="btn btn-outline-default btn-round btn-white btn-lg" target="_blank">View Login Page</a>
          </div> -->
        </div>
      </div>
</div>
      @include('footer')
  