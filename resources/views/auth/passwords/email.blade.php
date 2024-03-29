@extends('layouts.auth')

@section('content')

    <!-- title-->
    <h4 class="mt-0">{{ __('Reset Password') }}</h4>
    <p class="text-muted mb-4">{{ __('Enter your email address and we\'ll send you an email with instructions to reset your password.') }}</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- form -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="emailaddress">{{ __('Email Address') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Enter Your Email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-lock-reset"></i> {{ __('Reset Password') }} </button>
        </div>

    </form>
    <!-- end form-->

    <!-- Footer-->
    <footer class="footer footer-alt">
        <p class="text-muted">Back to <a href="{{ route('login') }}" class="text-muted ml-1"><b>{{ __('Log In') }}</b></a></p>
    </footer>
@endsection
