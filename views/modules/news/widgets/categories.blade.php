<div class="widget widget-category">
    <h3>{{ trans('themes::news.category.title') }}</h3>
    <ul>
        @foreach($categories as $category)
        <li><a href="{{ $category->url }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>