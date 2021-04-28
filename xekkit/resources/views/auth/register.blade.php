@extends('layouts.auth')

@section('title', 'Register')

@section('content')  
<main class="container">
    <div class="row align-items-center vh-100">           
        @include('partials.auth.login_title')
        <form method="POST" action="{{ route('register') }}" class="col-lg-5 p-3 g-3 border needs-validation bg-light" novalidate >
            {{ csrf_field() }}
            <p class="text-center fs-1">Register</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" value="{{ old('username')}}" required>
                <label for="username">Username *</label>
                @if ($errors->has('username'))
                  <div class="invalid-feedback">
                      {{ $errors->first('username') }}
                  </div>
                @endif
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email')}}" required>
              <label for="email" class="form-label">Email *</label>
              @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
              @endif
            </div>

            <div class="row g-2">
              <div class="col form-floating mb-3">
                  <input type="password" class="form-control" id="password" placeholder="Password" value="{{ old('password')}}" required>
                  <label for="password" class="form-label">Password *</label>
                  @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                  @endif                  
              </div>
              <div onclick="toggleEye(this)" class="col-1 text-center align-self-center">
                  <i class="fa fa-eye" aria-hidden="true"></i>
              </div>
            </div>
            <div class="row g-2">
              <div class="col form-floating mb-3">
                  <input type="password" class="form-control pe-5" id="confirmPassword" placeholder="Confirm Password" required>
                  <label for="confirmPassword" class="form-label">Confirm Password *</label>
              </div>
              <div onclick="toggleEye(this)" class="col-1 text-center align-self-center">
                  <i class="fa fa-eye" aria-hidden="true"></i>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="birthDate" placeholder="Birth Date" value="{{old('date')}}"required>
              <label for="birthDate" class="form-label">Birth Date *</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="inputGender" aria-label="Gender *" required>
                  <option selected></option>
                  <option value="0">Male</option>
                  <option value="1">Female</option>
                  <option value="2">Rather Not Say</option>
              </select>
              <label for="inputGender">Gender*</label>
              @if ($errors->has('gender'))
                <div class="invalid-feedback">
                    {{ $errors->first('gender') }}
                </div>
              @endif
            </div>
            <a href="{{ route('login') }}">Already have an account?</a>
            <div class="col-autom text-center">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>   
        </form>
    </div>
</main>

<script src={{ asset('js/validate_form.js') }} defer></script>    
@endsection
