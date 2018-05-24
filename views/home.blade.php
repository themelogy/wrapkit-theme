@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @themeSlide('anasayfa')
                    </div>
                </div>
            </div>
            <div class="container-fluid">

                {!! Menu::render('home', \Themes\Moderna\Presenter\HomeMenuLinksPresenter::class) !!}

                @newsLatestPosts(10, 'home-latest')

                @portfolioBrands(20)
            </div>
        </div>
    </div>
@stop
