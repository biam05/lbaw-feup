<div class="col-auto text-center mb-3">
    <div class="card align-items-center text-white bg-light-dark pt-3" style="width: 18rem;">
        <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
        <div class="card-body">
            <button class="card-title clickable text-white">
                @if($author->is_partner)
                    <i class="fas fa-check"></i>
                @endif
                <h5>{{ $author->username  }}</h5>
                </button>
            <div class="card-text">
                <p>Reputation: {{ $author->reputation  }}</p>
            </div>
        </div>
    </div>
</div>
