@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card wrap-card-body-r">
                <div class="card-body card-space-r">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="h3 py-3 text-monospace">
                                Welcome, ready to travel?
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0 pb-2">
                            <div class="col-md-4">
                                <div>
                                    <label for="name" class="col-form-label text-md-right ">{{ __('Name') }}</label>
                                </div>
                                <input id="name" type="text" class="form-control p-4 mp-color" name="name" value="{{ old('name') }}">

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                            </div>
                            <div class="col-md-4 ">
                                <div>
                                    <label for="surname" class="col-form-label text-md-right">{{ __('Surname') }}</label>
                                </div>
                                <input id="surname" type="text" class="form-control p-4 mp-color" name="surname" value="{{ old('surname') }}">

                                {{-- @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                            </div>
                            <div class="col-md-4">
                                <div class="pt-1 px-0">
                                    <div>
                                        <label for="birthday">Birthday</label>
                                    </div>
                                    <div>
                                        <input type="date" id="birthday" class="mp-color text-uppercase rounded " name="birthday" value="null" min="1900-01-01" max="2004-12-31">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row  justify-content-center mb-0 pb-2">
                            <div class="col-md-12">
                                <div>
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror p-4 mp-color" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  justify-content-center mb-0 pb-2">
                            <div class="col-md-6">
                                <div>
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror p-4 mp-color" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="password-confirm" class="col-form-label text-md-right ">{{ __('Confirm Password') }}</label>
                                </div>
                                <input id="password-confirm" type="password" class="form-control p-4 mp-color" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center pb-4">
                            <div class="col-8 pt-4">
                                <button type="submit" class="btn btn-color p-3 col-12 shadow">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection