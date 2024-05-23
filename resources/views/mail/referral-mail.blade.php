<x-mail::message>

# Hi, {{ $referralUser }}

A new member just registered using your referral ID.

<x-mail::button :url="https://p48inv.com/app/public/login">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
