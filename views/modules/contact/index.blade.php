@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'contact'])
                <h1>{{ trans('themes::contact.title') }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container m-b-30">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fs-sm-15 text-themecolor text-bold">{{ setting('theme::company-name') }}</h2>
                            @location('genel-mudurluk', 'footer')
                        </div>
                        <div class="col-md-6">
                            @include('contact::form')
                        </div>
                    </div>
                </div>
                <hr class="my-5"/>
                @locations('locations', 20, 1)
                <div class="container">
                    <div class="row">
                        <div class="col">
                            @locations('map', 20)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
