@foreach($brands->chunk(4) as $chunk)
<div class="row">
    @foreach($chunk as $brand)
    <div class="col-md-3">
        <div class="brand card card-shadow">
            <a href="{{ $brand->website }}" target="_blank"><img class="img-fluid" src="{{ $brand->present()->firstImage(null,80,'resize',100) }}" alt="{{ $brand->title }}" /></a>
            <div class="card-body">
                <h5>{{ $brand->title }}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach