@extends('layouts.app')

@section('title', 'Xekkit | FAQ')

@section('content')

<main class="container-xl text-light">
    <div class="row mb-3">
        <h1 class="col-auto"><i class="fas fa-book"></i>     FAQ</h1>
    </div>

    <div class="accordion accordion-flush" id="faq">
        @each('partials.faq.faq_question', $topics, 'topic')        
    </div>

    @auth
        @if (Auth::user()->is_moderator)
            @include('partials.faq.add_question')
        @endif   
    @endauth   
</main>

@endsection
