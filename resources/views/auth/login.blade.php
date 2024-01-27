@extends('layouts.auth')


@section('content')

<div class="auth-box">
    <div class="top mb-2 mt-5">
        <div class="logo">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('storage/images/coollogo_com-294982707.png') }}" alt="Website logo image"
                    class="img-fluid" />
            </a>
        </div>
    </div>
    <div class="card shadow p-lg-4">
        <div class="card-header">
            <p class="fs-5 mb-0">Login to your {{ config('app.name', 'Laravel') }} account</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-2">
                    <input id="email" type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com"
                        value="{{ old('email') }}" required autocomplete="email" autofocus />
                    <label>{{ __('Email Address') }}</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input id="password" name="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">
                    <label>{{ __('Password') }}</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100 px-3 py-2 text-uppercase">
                    {{ __('Login') }}
                </button>
            </form>
            <div class="mt-3 pt-3 border-top">
                @guest
                <p class="mb-1">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><i
                            class="fa fa-lock me-2"></i>{{ __('Forgot Your Password?') }}</a>
                    @endif
                </p>
                <span>Don't have an account?
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a></span>
                @endif
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection