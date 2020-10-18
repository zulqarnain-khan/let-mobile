@component('mail::message')
# Ads posted Mail ({{ config('app.url') }})

<p align="center" style="color: blue;align-items: center;">Welcome To <a href="{{ config('app.url') }}">Let Mobile</a>.</p>
Thank you for Posting ad at <a href="{{ config('app.url') }}">Let Mobile</a>.<br>
Here you can visit your ad by clicking on this
@component('mail::button', ['url' => $url])
Visit Ad
@endcomponent

Please Do not reply to this email because these will not be replied.<br>
Have questions? Please, review the FAQ page. If you can't find the answer there, contact us at support@letmobile.com Team <a href="{{ config('app.url') }}">Let Mobile.</a>.<br>
<strong>Regards</strong> <br>
<strong>Team</strong>  <a href="{{ config('app.url') }}">Let Mobile</a><br>
<strong>Manager</strong> Mudassar Abbas

Thanks,<br>
#{{ config('app.name') }}
@endcomponent
