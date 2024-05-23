<x-mail::message>

# Hi, {{ $referralUser }}

A new member just registered using your referral ID.

<x-mail::button :url="route('login')">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
