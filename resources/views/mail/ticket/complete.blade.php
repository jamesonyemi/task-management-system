@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else

#{{ $greeting = 'Completed Task' }}

@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)

{{ $line }}

{{ $line }} 


@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else

{{ 'Task Completed' }}

@component('mail::header', ['url' => url(route('tickets.tickets.index',Auth::user()->id, false))])
{{ 'Please click Here' }}
@endcomponent

{{-- Regards,<br>{{ config('app.subtitle') }} --}}
@endif