@switch($notification->type)
    @case("follow")
        @include('partials.notifications.follow', $notification)
        @break
    @case("comment")
        @include('partials.notifications.comment', $notification)
        @break
    @case("vote")
        @include('partials.notifications.vote', $notification)
        @break
    @default
@endswitch 
