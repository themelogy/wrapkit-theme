@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'portfolio.index'])
                <h1 class="title">{{ trans('themes::portfolio.title.meta_title') }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container">
                    @portfolioBrands(20, 'page-brand')
                </div>
            </div>
        </div>
    </div>
@stop
