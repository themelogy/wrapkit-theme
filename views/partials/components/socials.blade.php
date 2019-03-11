<ul class="social-links ml-auto">
    {!! $slot !!}
    @foreach(['email'=>'fa-envelope', 'facebook' => 'fa-facebook-f', 'twitter'=>'fa-twitter', 'google'=>'fa-google-plus-g', 'whatsapp'=>'fa-whatsapp', 'linkedin'=>'fa-linkedin', 'youtube'=>'fa-youtube-play'] as $sk => $sv)
    @if(setting('theme::'.$sk))
    	@if($sk == 'email') <li><a rel="nofollow" target="_blank" href="mailto:{{ setting('theme::'.$sk) }}"><i class="fas {{ $sv }}"></i></a></li> @else
        <li><a rel="nofollow" target="_blank" href="{{ setting('theme::'.$sk) }}"><i class="fab {{ $sv }}"></i></a></li>
        @endif
    @endif
    @endforeach
</ul>