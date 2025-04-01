@component('mail::message')
Hi, {{ $user->name}}. Forgot Password?

<p>It happens. Click the button below to reset your password.</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

! in case you have any issue recovering your password, please contact us
usingg the form from contact-as page
Thanks,<br> 

{{ config('app.name') }}

@endcomponent