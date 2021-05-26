@switch($notification->type)
    @case("partner_request")
        @include('partials.notifications.partner_request', $notification)
        @break
    @case("report_content")
        @include('partials.notifications.report_content', $notification)
        @break
    @case("report_user")
        @include('partials.notifications.report_user', $notification)
        @break
    @case("unban_appeal")
        @include('partials.notifications.unban_appeal', $notification)
        @break
    @default
@endswitch 
