@extends('layouts.app')

@section('title', 'Xekkit | Home')


@section('content')

@include('partials.news.trending')

@auth
    @include('partials.modals.new_post')
@endauth
  
@guest
    @include('partials.login_to_post')
@endguest



<main class="container-xl">
    @include('partials.homepage.feed')
</main>

@endsection
