@switch($mod_notification->type)
    @case("follow")
        @include('partials.notifications.follow', $mod_notification)
        @break
    @case("comment")
        @include('partials.notifications.comment', $mod_notification)
        @break
    @case("vote")
        @include('partials.notifications.vote', $mod_notification)
        @break
    @default
@endswitch 
