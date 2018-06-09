@extends('news::layouts.master')

@section('news.title')
    @component('partials.components.title', ['breadcrumbs'=>'news.tag'])
        <h1 class="title">{{ trans('news::tag.title.tag', ['tag'=>$tag->name]) }}</h1>
    @endcomponent
@endsection

@section('news.content')
    @forelse($posts as $post)
        @include('news::partials._post')
        @unset($post)
    @empty
        @component('partials.components.alert', ['alert'=>'warning'])
            {{ trans('themes::news.messages.post not found') }}
        @endcomponent
    @endforelse
    {!! $posts->links('partials.components.pagination') !!}
@endsection