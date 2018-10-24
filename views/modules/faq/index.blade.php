@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'faq.index'])
                <h1 class="title">{{ trans('themes::faq.title') }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="accordion" data-aos="flip-up" data-aos-duration="600">
                                <div id="accordion4" class="accordion">
                                    @forelse($faqs as $faq)
                                        @include('faq::_faq')
                                    @empty
                                        <div class="alert alert-warning">{{ trans('themes::faq.message.not found') }}</div>
                                    @endforelse
                                </div>
                            </div>
                            {!! $faqs->render() !!}
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

