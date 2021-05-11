@extends('layouts.app')

@section('title', 'Profile | x/' . $user->username )

@section('content')


<main class="container-xl">
    <section>
        <div class="row justify-content-start">
            <h5 class="col-auto text-white">
                @if($user->is_partner)
                    <i class="fas fa-check"></i>
                @endif    
                x/{{$user->username}}
            </h5>
            @if(Auth::user()->username != $user->username)
                <button type="button" class="col-auto clickable-big text-white" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-exclamation-triangle"></i>
                </button>
            @endif   
        </div>   
        <div class="row justify-content-start text-white align-items-end mb-3">
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
                        <a href="edit_profile.php" class="col align-self-end btn btn-primary">Edit Profile</a>
                    @else
                        <a href="#" class="col-auto align-self-end btn btn-primary">Follow</a>
                    @endif  
                @endauth   
            </div>            
        </div>
        <p class="lead text-white mb-3">{{$user->description}}</p>
    </section>

    <nav>
        <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
            @include('partials.tab', ['active' => True, 'type' => 'trending', 'pc' => False, 'name' => "Trending"])
            @include('partials.tab', ['active' => False, 'type' => 'top', 'pc' => False, 'name' => "Top"])
            @include('partials.tab', ['active' => False, 'type' => 'new', 'pc' => False, 'name' => "New"])
            @include('partials.tab', ['active' => False, 'type' => 'following', 'pc' => False, 'name' => "Following"])
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                
            </div>
            <div class="tab-pane fade" id="pills-top" role="tabpanel" aria-labelledby="pills-top-tab">
                
            </div>
            <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                
            </div>
            <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">
               
            </div>
        </div>
    </nav>
</main>

@endsection