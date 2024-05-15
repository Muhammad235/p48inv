<x-mail::message>
# Hi Admin,

Here are the list of users celebrating birthday this coming week:

@foreach ($users as $user)
    Name: {{ $user['name']}}, Email: {{ $user['email'] }}, Birthday: {{ date('jS F', strtotime($user['date_of_birth'])) }}
@endforeach


<x-mail::button :url="url('/adm')">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
