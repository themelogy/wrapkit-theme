<div class="widget widget-category m-b-20">
    <h3>{{ trans('themes::news.category.title') }}</h3>
    <ul>
        @foreach($categories as $category)
        <li><a href="{{ $category->url }}"><i class="fas fa-angle-right m-r-5 fs-sm-09"></i> {{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>