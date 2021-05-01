@extends('layouts.app')

@section('title', 'News | ' . $news->title) <!-- quero que apareça o titulo da noticia se calhar? -->

@section('content')


    <div class="container-xl">
        <div class="row mt-4">
            <div class="col-lg-8">
                @include('partials.post')
                @if(count($news->comments))
                    @include('partials.comments')
                @endif
            </div>

            <sidebar class="hidden-md-down col-lg-auto">
                @include('partials.user_card')
            </sidebar>
        </div>

    </div>


@endsection
