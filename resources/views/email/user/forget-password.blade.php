@component('mail::message')
# Change Password Mail ({{ config('app.url') }})

<p align="center" style="color: blue;align-items: center;">Welcome To Let Mobile.</p>
You have requested a password reset. To reset your password please click on the button below.

@component('mail::button', ['url' => $url])
Reset Now
@endcomponent
Please Do not reply to this email because these will not be replied.<br>
For further informations please contact our support team Let Mobile.<br>
<strong>Regards</strong> <br>
<strong>Team</strong>  Let Mobile<br>
<strong>Manager</strong> Mudassar Abbas

Thanks,<br>
#{{ config('app.name') }}
@endcomponent