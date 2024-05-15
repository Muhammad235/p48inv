<x-mail::message>

# Hi, {{ $referralUser }}

A new member just registered using your referral ID.

<x-mail::button :url="url('/dashboard')">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
