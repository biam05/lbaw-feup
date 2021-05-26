@switch($request->type)
    @case("partner_request")
        @include('partials.notifications.partner_request', $request)
        @break
    @case("report_content")
        @include('partials.notifications.report_content', $request)
        @break
    @case("report_user")
        @include('partials.notifications.report_user', $request)
        @break
    @case("unban_appeal")
        @include('partials.notifications.unban_appeal', $request)
        @break
    @default
@endswitch 
