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

@include('partials.modals.report_post')


<div class="container-xl">
    <div class="row hidden-md-down">
        <div class="col-12 col-lg-9">
            <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
                @auth
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active text-white" id="pills-feed-tab" data-bs-toggle="pill" data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed" aria-selected="true">Feed</button>
                    </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link text-white" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
                    </li>
                @endauth
                @guest
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active text-white" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
                    </li>
                @endguest
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white" id="pills-hot-tab" data-bs-toggle="pill" data-bs-target="#pills-hot" type="button" role="tab" aria-controls="pills-hoy" aria-selected="false">Hot</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @auth
                    <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
                        @each('partials.news.post', $feedPosts, 'news')
                         {{-- @foreach ($feedPosts as $post)
                            {{$post}}
                        @endforeach --}}
                    </div>
                    <div class="tab-pane fade show " id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                        @each('partials.news.post', $recentPosts, 'news')
                    </div>
                @endauth
                @guest
                    <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                        @each('partials.news.post', $recentPosts, 'news')
                    </div>
                @endguest                
                <div class="tab-pane fade" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
                    @each('partials.news.post', $hotPosts, 'news')
                </div>
            </div>
        </div>
    <div class="col-lg-3">
        <section class="container bg-light-dark text-white p-3 text-center">
            <h3 class="mb-4">Explore</h3>
            <hr class="text-muted">
            @include('partials.explore')
        </section>
    </div>
</div>

<nav class="hidden-lg-up">
    <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="nav-link active text-white" id="pills-feed-tab" data-bs-toggle="pill" data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed" aria-selected="true">Feed</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="pills-hot-tab" data-bs-toggle="pill" data-bs-target="#pills-hot" type="button" role="tab" aria-controls="pills-hoy" aria-selected="false">Hot</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="pills-explore-tab" data-bs-toggle="pill" data-bs-target="#pills-explore" type="button" role="tab" aria-controls="pills-explore" aria-selected="false">Explore</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
            @each('partials.news.post', $recentPosts, 'news')
        </div>
        <div class="tab-pane fade" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
            @each('partials.news.post', $hotPosts, 'news')
        </div>
        <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">
            <section class="container-xl bg-light-dark text-white p-3 text-center">
                @include('partials.explore')
            </section>
        </div>
    </div>
</nav>


@endsection
