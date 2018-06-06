@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'news'])
            <h1 class="title">{{ trans('themes::news.title') }}</h1>
            @endcomponent
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            İçerik
                        </div>
                        <div class="col-md-3">
                            @newsCategories('categories')
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection