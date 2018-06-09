@extends('news::layouts.master')

@section('news.title')
    @component('partials.components.title', ['breadcrumbs'=>'news.show'])
        <h1 class="title">{{ $post->title }}</h1>
    @endcomponent
@endsection

@section('news.content')
    <article class="row m-b-20">
        <div class="col-lg-12 col-xs-12 mt-sm-0">
            <div class="meta m-0">
                <ul class="list-inline">
                    <li class="date"><i class="far fa-calendar-alt"></i> {{ $post->created_at->formatLocalized('%d %B %Y') }}</li>
                    <li class="category"><a href="#"><i class="far fa-newspaper m-r-5"></i> {{ $post->category->name }}</a></li>
                </ul>
            </div>
            <div class="content m-t-20">
                <img class="img-thumbnail pull-left m-r-20 m-b-20" src="{{ $post->present()->firstImage(350,null,'resize',80) }}" alt="{{ $post->title }}" />
                {{ strip_tags($post->content) }}
            </div>
        </div>
    </article>
@endsection