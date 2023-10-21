@extends('layouts.auth')

@section('content')
<div class="auth-box">
    <div class="top mb-4">
        <div class="logo">
            <img src="coollogo_com-294982707.png" alt="" class="" />
        </div>
    </div>
    <div class="card shadow p-lg-4">
        <div class="card-header">
            <p class="fs-5 mb-0">{{ __('Register') }} an account</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating mb-1">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="John
            doe" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus /> <label>{{
        __('Name')}}</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-1">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="name@example.com" name="email" value="{{ old('email') }}" required
                        autocomplete="email" />
                    <label>{{ __('Email Address') }}</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password" />
                    <label>{{ __('Password') }}</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Password" />
                    <label>{{ __('Confirm Password') }}</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary w-100 px-3 py-2 mb-2">
                        {{ __('Register') }}
                    </button>
                    <span>Already have an account?
                        @guest
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                    </span>
                </div>
            </form>
            <div class="d-grid gap-2 mt-3 pt-3">
                <div class="text-center"><span>OR</span></div>
                <button class="btn btn-light">
                    <i class="fa fa-facebook-official"></i> Sign in with Facebook
                </button>
                <button class="btn btn-light">
                    <i class="fa fa-twitter"></i> Sign in with Twitter
                </button>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection