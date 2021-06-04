@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}

Your new password is: {{$password}}

Click below to login with your new password
@component('mail::button', ['url' => $link])
Go to login page
@endcomponent
Sincerely,
Xekkit team.
@endcomponent