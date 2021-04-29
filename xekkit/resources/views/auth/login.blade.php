@extends('layouts.auth')

@section('title', 'Login')

@section('content')  
<div class="container pt-5">
    <div class="row align-items-center">           
        @include('partials.auth.login_title')
        <form method="POST" action="{{ route('login') }}" class="col-lg-5 p-3 g-2 border bg-light" novalidate>
            {{ csrf_field() }}
            <p class="text-center fs-1">Login</p>
            <div class="form-floating mb-3 col-11">
                <input 
                    type="text" 
                    class="form-control @if ($errors->has('*')) is-invalid @endif" 
                    id="username" 
                    name="username" 
                    placeholder="Username" 
                    value="{{ old('username') }}"
                >
                <label for="username">Username</label>
            </div>
            <div class="row g-2">
                <div class="col-11 form-floating mb-3">
                    <input 
                        type="password" 
                        class="form-control @if ($errors->has('*')) is-invalid @endif" 
                        id="password" 
                        name="password" 
                        placeholder="Password"
                    >
                    <label for="password" class="form-label">Password</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('*') }}
                    </div>
                </div>
                <div onclick="toggleEye(this)" class="col-1 text-center pt-3">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <a href="{{ route('register') }}">You don't have an account?</a>
            <br>
            <a href="" data-bs-toggle="modal" data-bs-target="#forgotPassword" >Lost my password</a>
            <div class="col-auto text-center pt-2">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>

<script src={{ asset('js/validate_form.js') }} defer></script>       
@include('partials.auth.forgot_password_modal')
@endsection
