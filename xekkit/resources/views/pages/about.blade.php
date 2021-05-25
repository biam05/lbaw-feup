@extends('layouts.app')

@section('title', 'Xekkit | About')

@section('content')

<main class="container-xl text-white">  
    @include('partials.about.feupCarousel')
    <div class="container-xl pt-3">   
    
        <h1 class="text-white text-center py-4">Our Team</h1>
        
            <div class="row text-white pt-4">
                @include('partials.about.creator_card', ['number' => '201806551', 'name' => 'Beatriz Mendes'])
                @include('partials.about.creator_card', ['number' => '201800157', 'name' => 'Guilherme Calassi'])
                @include('partials.about.creator_card', ['number' => '201806140', 'name' => 'L. André Assunção'])
                @include('partials.about.creator_card', ['number' => '201604686', 'name' => 'Ricardo Cardoso'])
            </div>
         
        <hr class="text-white mt-5 mb-5">  
        <div class="row">
            <div class="col-md-9 order-md-2">
                <h2 class="featurette-heading text-white pt-5">Our Main Inspiration</h2>
                <p class="lead text-white">The majority of our website structure and concept (including the name, obviously)
                    is based on the famous website <a class="text-decoration-none text-primary" href="https://www.reddit.com/">©reddit</a></p>
            </div>
                <div class="col-md-3 order-md-1">
                <img src="{{ asset('img/reddit.jpg') }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="..." width = 400>
            </div>
        </div>
    </div>
</main>

@endsection
