<footer class="footer1 font-14">
    <div class="f1-topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-right" data-aos-duration="1200" data-aos-offset="50">
                    <nav class="navbar navbar-expand-lg f1-nav"> <a class="navbar-brand hidden-md-up" href="#">Menü</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ft1" aria-controls="ft1" aria-expanded="false" aria-label="Toggle navigation"> <span class="ti-menu"></span> </button>
                        <div class="collapse navbar-collapse" id="ft1">
                            {!! Menu::render('footer', \Themes\Moderna\Presenter\FooterMenuPresenter::class) !!}
                            <ul class="navbar-nav ml-auto theme-btn">
                                <li class="nav-item"><a class="btn btn-outline-secondary btn-rounded btn-sm" href="#"><i class="icon-Tap m-r-10 font-bold"></i>Online Ekspertiz</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Row  -->
    <div class="f1-middle">
        <div class="container">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <a href="#"><img src="{{ Theme::url('images/logo/netgd.svg') }}" height="60" alt="{{ setting('theme::company-name') }}" /></a>
                    <p class="m-t-20">
                        Hızlı ve güvenilir bir şekilde gayrimenkul değerleme (ekspertiz) hizmeti veren şirketimiz, geçmişten gelen bilgi birikimi, tecrübeli kadrosu, ekspertiz süreci ve raporlamadaki titizliği ile gayrimenkul değerleme firmaları arasında potansiyelini hızla yükseltmektedir.
                    </p>
                </div>
                <!-- Column -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    @location('genel-mudurluk', 'footer')
                </div>

                @inject("menuService", "Modules\Menu\Services\MenuService")
                <div class="col-lg-3 col-md-3 col-sm-12 m-t-5">
                    <h6 class="font-medium c-t-txt">{{ $menuService->title('our-services') }}</h6>
                    {!! Menu::render('our-services', \Themes\Moderna\Presenter\FooterMenuLinksPresenter::class) !!}
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 m-t-5">
                    <h6 class="font-medium c-t-txt">{{ $menuService->title('work-areas') }}</h6>
                    {!! Menu::render('work-areas', \Themes\Moderna\Presenter\FooterMenuLinksPresenter::class) !!}
                </div>

            </div>
        </div>
    </div>
    <!-- Row  -->
    <div class="f1-bottom-bar">
        <div class="container">
            <div class="d-flex">
                <div class="m-t-10 m-b-10 font-13">{!! trans('themes::theme.footer.copyrights', ['date'=>\Carbon\Carbon::now()->format('Y'), 'company'=>setting('theme::company-name')]) !!}</div>
                @component('partials.components.socials') @endcomponent
            </div>
        </div>
    </div>
</footer>