<div class="accordion-item">
    <h2 class="accordion-header" id="heading{{$topic->id}}">
        <button class="accordion-button collapsed text-white bg-light-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$topic->id}}" aria-expanded="true" aria-controls="flush-collapse{{$topic->id}}">
            {{$topic->question}}
        </button>
    </h2>
    <div id="flush-collapse{{$topic->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$topic->id}}" data-bs-parent="#faq">
        <div class="accordion-body">
            {{$topic->answer}}
            @auth
                @if(Auth::user()->is_moderator)
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2 me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-questionID="{{$topic->id}}">Edit</button>
                        <button type="button" class="btn btn-outline-danger btn-sm mt-2">Remove</button>
                    </div> 
                @endif   
            @endauth
        </div>
    </div>
</div>