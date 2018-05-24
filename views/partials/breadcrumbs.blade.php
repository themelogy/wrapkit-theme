@if ($breadcrumbs)
    <ol>
        <li><a href="{{ route('homepage') }}"><img src="{{ Theme::url('images/logo/netgd-icon.svg') }}" height="15" alt="{{ setting('theme::company-name') }}" /></a></li>
        @foreach ($breadcrumbs as $crumb)
            <?php
            $icon = isset($crumb->icon) ? '<i class="' . $crumb->icon . '"></i> ' : '';
            ?>

            @if ($crumb->url && ! $crumb->last)
                <li>
                    <a href="{{ $crumb->url }}">{!! $icon !!}{!! Str::words($crumb->title, 6) !!}</a>
                </li>
            @else
                <li class="active">{!! $icon !!}{!! Str::words($crumb->title, 6) !!}</li>
            @endif
        @endforeach
    </ol>
@endif