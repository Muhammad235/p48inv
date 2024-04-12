<x-mail::message>
# Hi, {{ $name }}

Welcome to {{config('app.name', 'P48InvestmentLtd')}}! We're thrilled to have you on board.

As a token of our appreciation, we're excited to introduce you to our referral program. Share your unique referral code with friends and family.

Your Referral Code: <b>{{ $referral_id }}</b>  <br>
Your Referral Link: <a href="{{ url("?ref=$referral_id") }}" target="_blank">{{ url("?ref=$referral_id") }}</a>

<b>You can also find your referral code and link conveniently on your dashboard once you log in.</b>

If you have any questions or need assistance, feel free to reach out to our support team at 
{{ config('app.mail_address') }}.


{{-- Warm regards,
{{config('app.name', 'P48InvestmentLtd')}} --}}

<x-mail::button :url="url('/dashboard')">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
