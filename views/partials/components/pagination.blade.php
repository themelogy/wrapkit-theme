@if ($paginator->hasPages())
    <nav class="clearfix">
        <ul class="pagination pagination-sm">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled hide">&laquo;</li>
            @else
                <li class="page-item">
                    <a class="page-link pag-prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">{{ trans('global.buttons.prev') }}</span>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link pag-next" href="{{ $paginator->nextPageUrl() }}" rel="next">></a></li>
            @else
                <li class="page-item disabled hide">&raquo;</li>
            @endif
        </ul>
    </nav>
@endif
