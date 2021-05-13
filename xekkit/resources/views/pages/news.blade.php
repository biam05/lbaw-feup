@extends('layouts.app')

@section('title', 'News | ' . $news->title)

@section('content')


<div class="container-xl">
    <div class="row mt-4">
        <div class="col-lg-8">
            @include('partials.news.post')
            @include('partials.news.comments')
        </div>
        <sidebar class="hidden-md-down col-lg-auto">
            @include('partials.users.user_card', ['user'=> $news->content->author])
        </sidebar>
    </div>
</div>

@endsection
