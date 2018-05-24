@php
    $pages         = $page->children()->orderBy('position')->paginate(@$page->settings->list_per_page ?? 6);
    $grid_size     = @$page->settings->list_grid ?? 3;
    $chunk_size    = ceil(12/$grid_size);
    $column_size   = is_float(12/$grid_size) ? $grid_size : $grid_size;
    $column_div    = ceil(12 % $grid_size);
@endphp
@if($pages->count()>0)
<div class="container">
    @if(@$page->settings->show_content)
    <div class="row">
        <div class="col-md-12">
            {!! $page->body !!}
        </div>
    </div>
    @endif
    @foreach($pages->chunk($chunk_size) as $chunk)
    <div class="row">
        @foreach($chunk as $page)
            <div class="col-md-@if($loop->first){{ $column_size }}@elseif($loop->last && $column_div){{ $column_div }}@else{{ $column_size }}@endif">
                <div class="card border page-card">
                    <a href="{{ $page->url }}">
                        <div class="card-body">
                            <h5 class="card-title font-16 title">{{ $page->title }}</h5>
                        </div>
                        <div class="overlay"></div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">
            {!! $pages->links('partials.components.pagination') !!}
        </div>
    </div>
</div>
@endif