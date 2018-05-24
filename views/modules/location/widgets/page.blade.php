<div class="vtabs customvtab border p-10">
    <ul class="nav nav-tabs flex-column tabs-vertical" role="tablist">
        @foreach($locations as $location)
            <li class="nav-item text-nowrap"> <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $location->slug }}" role="tab">{{ $location->name }}</a> </li>
        @endforeach
    </ul>
    <!-- Tab panes -->
    <div class="tab-content py-0">
        @foreach($locations as $location)
            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $location->slug }}" role="tabpanel">
                <div class="px-20">
                    <div class="d-flex no-block">
                        <div class="m-t-5 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                        <div class="info">
                            <p>{!! $location->present()->address !!}</p>
                        </div>
                    </div>
                    @if($location->phone1)
                        <div class="d-flex no-block">
                            <div class="m-t-5 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                            <div class="info">
                                <span class="font-medium db m-t-5">{{ $location->phone1 }}</span>
                            </div>
                        </div>
                    @endif
                    @if($location->fax)
                        <div class="d-flex no-block">
                            <div class="m-t-5 m-r-20 align-self-top"><i class="icon-Fax"></i></div>
                            <div class="info">
                                <span class="font-medium db m-t-5">{{ $location->fax }}</span>
                            </div>
                        </div>
                    @endif
                    @if($location->email)
                        <div class="d-flex no-block">
                            <div class="m-t-5 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                            <div class="info">
                                <a href="#" class="font-medium text-themecolor db m-t-5">{{ $location->email }}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>