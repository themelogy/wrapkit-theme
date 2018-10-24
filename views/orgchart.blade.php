@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'page'])
                <h1 class="title">{{ $page->title }}</h1>
            @endcomponent
            <div class="content-wrapper">
                @includeWhen($page->parent && @$page->parent->settings->show_menu && !@$page->settings->full_page, 'page::page-with-sidebar', ['page'=>$page])
                @includeWhen($page && @$page->settings->list_page, 'page::page-list', ['page'=>$page])
                @includeWhen($page && !@$page->settings->list_page && !@$page->parent->settings->show_menu, 'page::page', ['page'=>$page])
            </div>
        </div>
    </div>
@stop


@push('script-stack')
    {!! Theme::style('vendor/orgchart/css/jquery.orgchart.min.css') !!}
    {!! Theme::script('vendor/orgchart/js/jquery.orgchart.min.js') !!}
@endpush

@push('js-inline')
    <script>
        (function($){
            $(function() {
                var oc = $('#chart-container').orgchart({
                    'data' : $('#ul-data'),
                    'toggleSiblingsResp': true
                });
            });
        })(jQuery);
    </script>
@endpush
