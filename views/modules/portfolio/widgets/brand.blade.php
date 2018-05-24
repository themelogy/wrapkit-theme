<div class="client2">
    <div class="container">
        <div class="row client-box text-center owl-carousel owl-theme">
            @foreach($brands as $brand)
            <div class="item">
                <a href="{{ $brand->website }}" target="_blank"><img src="{{ $brand->present()->firstImage(null,60,'resize',70) }}" alt="{{ $brand->title }}" /></a>
            </div>
            @endforeach
        </div>
    </div>
</div>