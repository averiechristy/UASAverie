@component('mail::message')
# Introduction

@component('mail::message')
# Purchase {Product}: {{$checkout->Product->title}}

Hi {{$checkout->User->name}}
<br>
Thank you for purchase <b>{{$checkout->Product->title}}</b>, please see payment instruction by click the button below.

@component('mail::button', ['url' => route('dashboard', $checkout->id)])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
