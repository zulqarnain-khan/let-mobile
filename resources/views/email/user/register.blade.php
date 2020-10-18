@component('mail::message')
# Verify Account Mail ({{ config('app.url') }})

<p align="center" style="color: blue;align-items: center;">Welcome To Let Mobile.</p>
Thank you for registering at Let Mobile.<br>
Your Registeration will not be completed until you visit the following link

@component('mail::button', ['url' => $url])
Verify here
@endcomponent
Verify Your Email<br>
This verification link can only be used once.<br>
Please Do not reply to this email because these will not be replied.<br>
For further informations please contact our support team Let Mobile.<br>
<strong>Regards</strong> <br>
<strong>Team</strong>  Let Mobile<br>
<strong>Manager</strong> Mudassar Abbas

Thanks,<br>
#{{ config('app.name') }}
@endcomponent
