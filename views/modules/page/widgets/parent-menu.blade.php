@if($pages->count()>0)
<ul class="list-group page-list">
    @foreach($pages as $page)
        <li class="list-group-item list-group-item-action @if(array_last(Request::segments())==$page->slug)active @endif"><a href="{{ $page->url }}">{{ $page->title }}</a></li>
    @endforeach
</ul>
@endif