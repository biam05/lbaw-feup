@extends('layouts.auth')

@section('title', 'Login')

@section('content')  
<main class="container">
    <div class="row align-items-center vh-100">           
        @include('partials.auth.login_title')
        <form method="POST" action="{{ route('login') }}" class="col-lg-5 p-3 g-3 border needs-validation bg-light" novalidate >
            {{ csrf_field() }}
            <p class="text-center fs-1">Login</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username/Email"value="{{ old('username') }}" required>
                <label for="username">Username/Email</label>
                @if ($errors->has('username'))
                    <div class="invalid-feedback">
                        <!-- Username not found. -->
                        {{ $errors->first('username') }}
                    </div>
                @endif
            </div>
            <div class="row g-2">
                <div class="col form-floating mb-3">
                    <input type="password" class="form-control pe-5" id="password" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <!-- Invalid password. -->
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div onclick="toggleEye(this)" class="col-1 text-center align-self-center">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe"  {{ old('remember') ? 'checked' : '' }}>
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
