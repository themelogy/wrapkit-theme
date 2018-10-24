<header class="topbar">
    <div class="header12 po-relative">
        <div class="h12-topbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg font-14">
                    <a class="slogan" href="{{ LaravelLocalization::getLocalizedURL(locale(), url(locale())) }}">{!! trans('themes::theme.header.slogan') !!}</a>
                    <button class="navbar-toggler op-5" type="button" data-toggle="collapse" data-target="#header12" aria-controls="header12" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-ellipsis-v"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="header12">
                        @component('partials.components.socials')
                            <li><a href="tel:{{ setting('theme::phone') }}"><i class="icon icon-Phone-2 font-bold"></i> {{ setting('theme::phone') }} (pbx)</a></li>
                        @endcomponent
                        <div class="btn-group language">
                            <a href="#" class="dropdown-toggle btn-sm font-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() == "en" ? "us" : LaravelLocalization::getCurrentLocale() }}"></span> {{ LaravelLocalization::getCurrentLocaleNative() }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated fadeInDown">
                                @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                                <a class="dropdown-item font-12" hreflang="{!! $locale !!}" href="{{ url($locale) }}"><span class="flag-icon flag-icon-{{ $locale == "en" ? "gb" : $locale }}"></span> {{ $supportedLocale['native'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <!-- Header 12 navabar -->
            <nav class="navbar navbar-default navbar-expand-lg hover-dropdown h12-nav">
                <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL(locale(), url(locale())) }}"><img src="{!! Theme::url('images/logo/netgd.svg') !!}" alt="{{ setting('theme::company-name') }}" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header12a" aria-controls="header12a" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="navbar-collapse collapse" id="header12a">
                    {!! Menu::render('header', \Themes\Wrapkit\Presenter\HeaderMenuPresenter::class) !!}
                </div>
            </nav>
        </div>
    </div>
</header>

@push('script-stack')
    {!! Asset::add(Theme::url('vendor/smartmenus/jquery.smartmenus.min.js')) !!}
@endpush

@push('js-inline')
    <script>
        (function(){
            $(function() {
                $('#main-menu').smartmenus({
                    mainMenuSubOffsetX: 0,
                    mainMenuSubOffsetY: 0,
                    subMenusSubOffsetX: 0,
                    subMenusSubOffsetY: -2
                });
            });
            $(function() {
                $('#main-menu').bind({
                    'show.smapi': function(e, menu) {
                        $(menu).removeClass('hide-animation').addClass('show-animation');
                    },
                    'hide.smapi': function(e, menu) {
                        $(menu).removeClass('show-animation').addClass('hide-animation');
                    }
                }).on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', 'ul', function(e) {
                    $(this).removeClass('show-animation hide-animation');
                    e.stopPropagation();
                });
            });
        })(jQuery);
    </script>
@endpush