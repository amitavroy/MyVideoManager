@component('mail::message')

# Your account is created. 

You need to activate your account by clicking the link.

@component('mail::button', ['url' => route('activate-account', $user->activation_token)])
Activate account
@endcomponent

Thanks,<br>
Support @ Video Manager
@endcomponent
