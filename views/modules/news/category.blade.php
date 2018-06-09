@extends('news::layouts.master')

@section('news.title')
    @component('partials.components.title', ['breadcrumbs'=>'news.category'])
        <h1 class="title">{{ $category->name }}</h1>
    @endcomponent
@endsection

@section('news.content')
    @forelse($posts as $post)
        @include('news::partials._post')
        @unset($post)
    @empty
        @component('partials.components.alert', ['alert'=>'warning'])
            {{ trans('themes::news.messages.category post not found', ['category' => $category->name]) }}
        @endcomponent
    @endforelse
    {!! $posts->links('partials.components.pagination') !!}
@endsection