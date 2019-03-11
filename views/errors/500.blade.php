@extends('layouts.master')

@php
    seo_helper()->setTitle('500 - Sistem hatası');
@endphp

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title')
                <h1 class="title">{{ trans('error.title.has an error') }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container">
                    {{ trans('error.messages.has an error') }}
                </div>
            </div>
        </div>
    </div>
@stop