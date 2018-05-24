@if($location->count()>0)
    <div class="d-flex no-block">
        <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
        <div class="info">
            <span class="font-medium text-themecolor db m-t-5">{{ $location->name }}</span>
            <p>{{ $location->present()->address }}</p>
        </div>
    </div>
    @if($location->phone1)
        <div class="d-flex no-block">
            <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
            <div class="info">
                <span class="font-medium text-themecolor db m-t-5">{{ $location->phone1 }}</span>
            </div>
        </div>
    @endif
    @if($location->fax)
        <div class="d-flex no-block">
            <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Fax"></i></div>
            <div class="info">
                <span class="font-medium text-themecolor db m-t-5">{{ $location->fax }}</span>
            </div>
        </div>
    @endif
    @if($location->email)
        <div class="d-flex no-block">
            <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
            <div class="info">
                <a href="#" class="font-medium text-themecolor db m-t-5">{{ $location->email }}</a>
            </div>
        </div>
    @endif
@endif