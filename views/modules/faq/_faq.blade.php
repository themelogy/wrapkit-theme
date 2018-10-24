<div class="card">
    <div class="card-header" role="tab" id="head{{ $faq->id }}">
        <h5 class="mb-0">
            <a data-toggle="collapse" href="#collapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? ' true' : 'false' }}" aria-controls="collapse7">
                {{ $faq->title }}
            </a>
        </h5>
    </div>
    <div id="collapse{{ $faq->id }}" class="collapse{{ $loop->first ? ' show' : '' }}" role="tabpanel" aria-labelledby="head{{ $faq->id }}" data-parent="#accordion4">
        <div class="card-body">
            {!! $faq->content !!}
        </div>
    </div>
</div>