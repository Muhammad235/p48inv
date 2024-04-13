@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="{{ asset('logo.png') }}" class="logo" style="width: 100%" alt="{{ config('app.name') }} Logo">
{{-- @else --}}
{{ $slot }}
{{-- @endif --}}
</a>
</td>
</tr>
