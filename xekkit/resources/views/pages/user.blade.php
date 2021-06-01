@extends('layouts.app')

@section('title', 'Profile | x/' . $user->username )

@section('content')

<main class="container-xl">
    <section>
        <div class="row justify-content-start">
            <h4 class="col-auto text-light">
                @if($user->is_partner)
                    <i id="user-partner" class="fas fa-check"></i>
                @endif
                x/{{$user->username}}
            </h4>
            @if (Auth::check() && Auth::user()->is_moderator)
                <button type="button" class="col-auto clickable-big text-warning" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-ban"></i>
                </button>
            @elseif(Auth::check() && Auth::user()->username != $user->username)
                @include('partials.modals.report', ['report_to_id' => $user->id, 'type'=>"user"])
                <button type="button" class="col-auto clickable-big text-warning" data-bs-toggle="modal" data-bs-target="#reportUser_{{$user->id}}">
                    <i class="fas fa-exclamation-triangle"></i>
                </button>
            @endif
        </div>
        <div class="row justify-content-start text-light align-items-end mb-3">
            <div class="col-auto">
                @if(!empty($user->photo))
                <img src={{ asset('storage/img/users/' . $user->photo) }} class="card-img-top" alt="{{ $user->username }}"
                    style="width: 10rem;">
                @else
                <img src={{ asset('img/user.png') }} class="card-img-top" alt="user image"
                    style="width: 10rem;">
                @endif
            </div>

            <div class="col-auto">
                <h6 class="text-muted">Reputation</h6>
                <h2>{{$user->reputation}}</h2>
                @auth
                    @if(Auth::user()->username == $user->username)
                        <a href="/user/{{Auth::user()->username}}/edit" class="col align-self-end btn btn-primary">Edit Profile</a>
                        @if($user->is_partner)
                            @include('partials.modals.stop_partnership')

                        @else
                            @if(!Auth::user()->pendingPartnerRequests())
                                @include('partials.modals.partner_request')
                            @endif
                           
                        @endif
                    @else
                        @if(Auth::user()->isfollowing($user))
                            <button id="follow_button" onclick='unfollow({{$user->id}}, {{Auth::user()->id}})' class="col-auto align-self-end btn btn-primary">Unfollow</button>
                        @else
                            <button id="follow_button" onclick='follow({{$user->id}}, {{Auth::user()->id}})' class="col-auto align-self-end btn btn-primary">Follow</button>
                        @endif
                        
                    @endif
                @endauth
            </div>
        </div>
        <p class="lead text-light mb-3">{{$user->description}}</p>
    </section>

    <nav>
        <ul class="nav nav-pills mb-3 text-light bg-light-dark" id="pills-tab" role="tablist">
            @include('partials.tab', ['active' => True, 'type' => 'trending', 'pc' => False, 'name' => "Trending"])
            @include('partials.tab', ['active' => False, 'type' => 'top', 'pc' => False, 'name' => "Top"])
            @include('partials.tab', ['active' => False, 'type' => 'new', 'pc' => False, 'name' => "New"])
            @include('partials.tab', ['active' => False, 'type' => 'following', 'pc' => False, 'name' => "Following"])
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @include('partials.tab_content', ['active'=>True, 'type'=>'trending', 'pc'=>False, 'explore'=>False, 'posts'=>$trendingPosts])
            @include('partials.tab_content', ['active'=>False, 'type'=>'top', 'pc'=>False, 'explore'=>False, 'posts'=>$topPosts])
            @include('partials.tab_content', ['active'=>False, 'type'=>'new', 'pc'=>False, 'explore'=>False, 'posts'=>$recentPosts])

            <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">
                @if(count($following) === 0)
                    <p class="text-light text-center h6 pt-4 pb-3">No results found</p>
                @else
                    <div class="row text-light pt-4 justify-content-evenly">
                        @each('partials.users.user_card', $following, 'user')
                    </div>
                @endif
            </div>
        </div>
    </nav>
</main>

@once
    <script defer src="{{ asset('js/follow.js') }}"></script>
@endonce

@endsection
