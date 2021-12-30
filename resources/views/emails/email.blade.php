@component('mail::message')
<div style="direction:rtl;float:right;">
<p>{!!$content!!}</p>

شكرا,<br>
{{ config('app.name') }}
</div>
@endcomponent
