@component('mail::message')

<h3>{{ $mailData['title'] }}</h3>
<p>{!! $mailData['body'] !!}</p>

Salam,<br>
{{ config('app.name') }}
@endcomponent
  