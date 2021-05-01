@extends('layouts.app')

@section('title', 'News') <!-- quero que apareça o titulo da noticia se calhar? -->

@section('content')


<div class="container-xl">
    <div class="row mt-4">
        <div class="col-lg-8">
            @include('partials.post')
            @include('partials.comments')
        </div>

        <sidebar class="hidden-md-down col-lg-auto">
            @include('partials.user_card', ['author'=> $author])
        </sidebar>
    </div>

</div>


@endsection
