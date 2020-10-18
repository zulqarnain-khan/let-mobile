@component('mail::message')
# Cotact Us Mail ({{ config('app.url') }})
<br>
Hello, {{$name}}!<br>
<p align="center" style="color: blue;align-items: center;">Welcome To Let Mobile.</p>
Thanks For Contacting Us. We will in touch.

Please Do not reply to this email because these will not be replied.<br>
For further informations please contact our support team Let Mobile.<br>
<strong>Regards</strong> <br>
<strong>Team</strong>  Let Mobile<br>
<strong>Manager</strong> Mudassar Abbas

Thanks,<br>
#{{ config('app.name') }}
@endcomponent