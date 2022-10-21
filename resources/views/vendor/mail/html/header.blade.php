<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">

<img src="{{ asset('assets-guest/images/logo-dark.png') }}" class="logo" alt="Jalur Mandiri">
@if (trim($slot) === 'Jalur Mandiri')
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
