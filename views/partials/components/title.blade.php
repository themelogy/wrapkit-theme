<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $slot !!}
            </div>
        </div>
    </div>
    <div class="overlay bg-{{ rand(1,3) }}"></div>
</div>
@if(isset($breadcrumbs))
<div class="breadcrumbs">
    <div class="container">
        {!! Breadcrumbs::renderIfExists($breadcrumbs) !!}
    </div>
</div>
@endif