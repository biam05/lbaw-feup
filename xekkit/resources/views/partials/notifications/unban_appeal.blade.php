<div class="card bg-light-dark text-light mb-3">
    <div class="card-body">
        <div class="card-title">
            <i class="fas fa-ban"></i>
            <a href="/user/{{$request->request->user->username}}" class="link-light">{{$request->request->user->username}}</a>
            created an <b class="text-secondary">unban appeal</b>:
        </div>
        <p class="card-text fw-light">{{$request->request->reason}}</p>
        <p class="card-text">Ban motive:</p>
        <p class="card-text fw-light">{{$request->ban->reason}}</p>

        @include('partials.notifications.request_approval', ['request' => $request->request])

    </div>
</div>
