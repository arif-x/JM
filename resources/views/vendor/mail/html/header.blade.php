<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Jalur Mandiri')
<img src="https://jalurmandiri.com/assets-guest/images/logo-dark.png" class="logo" alt="Jalur Mandiri">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
