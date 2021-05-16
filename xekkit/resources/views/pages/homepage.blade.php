@extends('layouts.app')

@section('title', 'Xekkit')


@section('content')

@include('partials.news.trending')

@auth
    @include('partials.modals.new_post')
@endauth
  
@guest
    @include('partials.login_to_post')
@endguest



<main class="container-xl">
    @include('partials.homepage.feed_pc')
    @include('partials.homepage.feed_mobile')
</main>

@endsection
