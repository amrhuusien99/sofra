@component('mail::message')

# Introduction

Sofra Application 

<div> The Restaurant Was Unable To Accept Your Request

    <br> @foreach ($data as $key => $value)

            {{ $key }} :   
            {{ $value }}
            <br>

        @endforeach

        

</div>

Thanks,<br>

{{ config('app.name') }}

@endcomponent
