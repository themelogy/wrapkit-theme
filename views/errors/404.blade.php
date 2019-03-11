@extends('layouts.master')

@php
    seo_helper()->setTitle('404 - Sistem hatası');
    app()->setLocale('tr');
asgard_editor()
@endphp

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title')
                <h1 class="title">{{ trans('error.title.not found http') }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container">
                    {{ trans('error.messages.not found http') }}
                </div>
            </div>
        </div>
    </div>
@stop