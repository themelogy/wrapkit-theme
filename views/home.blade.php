@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container" style="padding: 0;">
                @themeSlide('anasayfa')
            </div>
            <div class="container-fluid">

                {!! Menu::render('home', \Themes\Moderna\Presenter\HomeMenuLinksPresenter::class) !!}

                @newsLatestPosts(3, 'home-latest')

                @portfolioBrands(20)
            </div>
        </div>
    </div>
@stop
