@extends('layouts.app')

@section('title', 'News | ' . $news->title) <!-- quero que apareça o titulo da noticia se calhar? -->

@section('content')


<div class="container-xl">
    <div class="row mt-4">
        <div class="col-lg-8">
            @include('partials.news.post')
            @if(count($news->comments))
                @include('partials.news.comments')
            @endif
        </div>

        <sidebar class="hidden-md-down col-lg-auto">
            @include('partials.users.user_card', ['user'=> $author])
        </sidebar>
    </div>


@endsection
