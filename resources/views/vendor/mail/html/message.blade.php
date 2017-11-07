@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
<<<<<<< HEAD
            {{ config('app.name') }}
=======
           {{ config('app.subtitle') }}
>>>>>>> 55419673dbfbe47667182542ab20190923e46227
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
<<<<<<< HEAD
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
=======
            &copy; {{ date('Y') }} {{ config('app.subtitle') }}. All rights reserved.
>>>>>>> 55419673dbfbe47667182542ab20190923e46227
        @endcomponent
    @endslot
@endcomponent
