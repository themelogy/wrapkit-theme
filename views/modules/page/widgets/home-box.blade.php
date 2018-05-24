@if($pages->count()>0)
<div class="feature24">
    <div class="container">
        <div class="row wrap-feature-24">
            @foreach($pages as $page)
            <div class="col-lg-3 col-md-6">
                <div class="card card-shadow">
                    <a href="{{ $page->url }}" class="service-24"> <i class="{{ @$page->settings->iconmind }}"></i>
                        <h6 class="ser-title">{{ $page->title }}</h6>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif