@extends('layouts.auth')

@section('title', 'Login')

@section('content')  
<main class="container">
    <div class="row align-items-center">           
        @include('partials.auth.login_title')
        <form method="POST" action="{{ route('login') }}" class="col-lg-5 p-3 g-3 border bg-light" novalidate >
            {{ csrf_field() }}
            <p class="text-center fs-1">Login</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username/Email"value="{{ old('username') }}" required>
                <label for="username">Username/Email</label>
            </div>
            <div class="row g-2">
                <div class="col form-floating mb-3">
                    <input type="password" class="form-control pe-5 @if ($errors->has('username')) is-invalid @endif" id="password" name="password" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                </div>
                <div onclick="toggleEye(this)" class="col-1 text-center pt-3">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <a href="{{ route('register') }}">You don't have an account?</a>
            <br>
            <a href="" data-bs-toggle="modal" data-bs-target="#forgotPassword" >Lost my password</a>
            <div class="col-auto text-center">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </div>
        </form>
    </div>
</main>

<script src={{ asset('js/validate_form.js') }} defer></script>       
@include('partials.auth.forgot_password_modal')
@endsection
