@component('mail::message')

# Introduction

Sofra Application 

<div> The Order Was Rejected By The Client ,

    <br> @foreach ($data as $key => $value)

            {{ $key }} :   
            {{ $value }}
            <br>

        @endforeach

        

</div>

Thanks,<br>

{{ config('app.name') }}

@endcomponent
