@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent
{{$data}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
