@component('mail::message')
# New Signup

A new user has signed up for your service

@component('mail::table')
| Field         | Value         |
| ------------- |:-------------:|
| Name          | {{$name}} |
| Email         | {{$email}} |
| Theme         | {{$theme}} |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
