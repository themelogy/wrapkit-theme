@isset($tags)
    @if($tags->count()>0)
    <div class="widget widget-tags m-b-20">
        <h3>{{ trans('tag::tags.tag') }}</h3>
        @foreach($tags as $tag)
            <a class="btn btn-light btn-xs border" href="{{ route('news.tag', $tag->slug) }}">{{ $tag->name }}</a>
        @endforeach
    </div>
    @endif
@endisset