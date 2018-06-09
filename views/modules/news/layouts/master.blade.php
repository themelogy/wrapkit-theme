@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @yield('news.title')
            <div class="content-wrapper content-news">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            @yield('news.content')
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            @include('news::partials.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection