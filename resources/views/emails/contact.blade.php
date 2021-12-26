@component('mail::message')
# راسلنا

<p>الاسم: {{ request('name') }}</p>
<p>البريد الالكتروني: {{ request('email') }}</p>
<p>الموضوع: {{ request('message') }}</p>


شكرا,<br>
{{ config('app.name') }}
@endcomponent
