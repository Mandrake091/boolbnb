@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <div class="card wrap-card-body">
                <div class="card-body card-space">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="h3 py-3 text-monospace">
                                Welcome back, sing in!
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0 pb-2">
                            <div class="col-md-8">
                                <div>
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror p-4 mp-color" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-0">
                            <div class="col-md-8">
                                <div>
                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link text-secondary px-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot?') }}
                                    </a>
                                    @endif
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror p-4 mp-color" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row justify-content-center pt-4">
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center pb-4">
                            <div class="col-8">
                                <button type="submit" class="btn btn-color p-3 col-12 shadow">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0 justify-content-center pb-5">
                            <div class="col-4">
                                <a href="https://www.facebook.com/" class="text-white"><button type="submit" class="btn btn-primary py-3 col-12 shadow">Facebook</button></a>
                            </div>
                            <div class="col-4">
                                <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="text-dark"><button type="submit" class="btn btn-trasparent py-3 col-12 shadow">Google</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection