<!doctype html>
<html lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>
    @include('partials.metadata')
</head>
<body>

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label m-t-10"><img src="{!! Theme::url('images/logo/netgd.svg') !!}" alt="{{ setting('theme::company-name') }}" height="50" /></p>
        </div>
    </div>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

@include('partials.scripts')

</body>
</html>
