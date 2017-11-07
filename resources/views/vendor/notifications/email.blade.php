@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
<<<<<<< HEAD
# Hello!
=======
#{{ $greeting = 'Password Reset Request' }}
>>>>>>> 55419673dbfbe47667182542ab20190923e46227
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
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
<<<<<<< HEAD
{{ $line }}
=======
{{ $line }} 
>>>>>>> 55419673dbfbe47667182542ab20190923e46227

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
<<<<<<< HEAD
Regards,<br>{{ config('app.name') }}
=======
Regards,<br>{{ config('app.subtitle') }}
>>>>>>> 55419673dbfbe47667182542ab20190923e46227
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below
into your web browser: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
