@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" target="_blank"  style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="{{ asset('logo.png') }}" width="80%"  class="logo"  alt="{{ config('app.name') }} Logo">
{{-- @else --}}
{{ $slot }}
{{-- @endif --}}
</a>
</td>
</tr>
