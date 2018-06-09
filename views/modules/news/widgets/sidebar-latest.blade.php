<div class="widget widget-latest m-b-20">
    <h3>{{ trans('themes::news.recent posts') }}</h3>
    <ul>
        @foreach($posts as $post)
        <li class="d-flex flex-sm-row">
            <div class="image">
                <a href="{{ $post->url }}"><img class="img-thumbnail rounded" src="{{ $post->present()->firstImage(70,70,'fit',80) }}" alt="{{ $post->title }}" /></a>
            </div>
            <div class="content">
                <h3 class="m-0"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                <div class="date m-t-5">{{ $post->created_at->formatLocalized('%d %B %Y') }}</div>
            </div>
        </li>
            @unset($post)
        @endforeach
    </ul>
</div>