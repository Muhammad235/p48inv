<x-mail::message>

<img src="{{ asset('logo.png') }}" alt="" width="100%" height="170px" style="margin-bottom: 30px;">

# Hi, {{ $referralUser }}

A new member just registered using your referral ID.

<x-mail::button :url="''">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
