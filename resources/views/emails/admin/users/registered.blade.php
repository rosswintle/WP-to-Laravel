@component('mail::message')
# New WP to Laravel user

A new user registered:

* Name: {{ $user->name }}
* Email address: {{ $user->email }}
* Created at: {{ $user->created_at }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
