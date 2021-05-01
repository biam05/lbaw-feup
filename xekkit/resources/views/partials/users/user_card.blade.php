<div class="col-auto text-center mb-3">
    <div class="card align-items-center text-white bg-light-dark pt-3" style="width: 18rem;">
        <img src={{ asset('img/users/' . $user->photo) }} class="card-img-top" alt="user image" style="width: 10rem;">
        <div class="card-body">
            <button class="card-title clickable text-white">
                @if($user->is_partner)
                    <h5> {{ $user->username }} <i class="fas fa-check"></i></h5>
                @else
                <h5> {{ $user->username }}</h5>
                @endif
            </button>
            <div class="card-text">
                <p>Reputation: {{ $user->reputation  }}</p>
            </div>
        </div>
    </div>
</div>
