@component('mail::message')
# Welcome

Hi {{$user->name}}
<br>
Welcome to Rocking Horse Mama, your account has been created successfully. Now you can choose your best fashion style!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
