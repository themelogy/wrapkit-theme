@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'faq.view'])
                <h1 class="title">{{ $faq->title }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            {!! $faq->content !!}
                        </div>
                        <div class="col-md-3">
                            @include('faq::partials.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

