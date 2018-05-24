<!doctype html>
<html lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>
    @include('partials.metadata')
</head>
<body>

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Net Kurumsal Değerleme</p>
        </div>
    </div>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

@include('partials.scripts')

</body>
</html>
