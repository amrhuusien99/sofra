@component('mail::message')

# Introduction

Sofra Application 

<div> The Order Has Been Accepted Successfully ... It Will Take About 30 Minutes ,

    <br> @foreach ($data as $key => $value)

            {{ $key }} :   
            {{ $value }}
            <br>

        @endforeach

        

</div>

Thanks,<br>

{{ config('app.name') }}

@endcomponent
