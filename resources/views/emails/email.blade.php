@component('mail::message')
<p>{!!$content!!}</p>

شكرا,<br>
{{ config('app.name') }}
@endcomponent
