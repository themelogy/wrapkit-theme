<ul class="social-links ml-auto">
    {!! $slot !!}
    @foreach(['facebook' => 'fa-facebook-f', 'twitter'=>'fa-twitter', 'google'=>'fa-google-plus-g', 'whatsapp'=>'fa-whatsapp', 'linkedin'=>'fa-linked-in', 'youtube'=>'fa-youtube-play'] as $sk => $sv)
    @if(setting('theme::'.$sk))
        <li><a target="_blank" href="{{ setting('theme::'.$sk) }}"><i class="fab {{ $sv }}"></i></a></li>
    @endif
    @endforeach
</ul>