@component('mail::message')

# Introduction

Sofra Reset Password

<p> Your Reset Code Is : {{$code}} </p>

Thanks,<br>

{{ config('app.name') }}

@endcomponent
