<div class="page-title">
    <div class="container">
        {!! $slot !!}
    </div>
    <div class="overlay"></div>
</div>
@if(isset($breadcrumbs))
<div class="breadcrumbs">
    <div class="container">
        {!! Breadcrumbs::renderIfExists($breadcrumbs) !!}
    </div>
</div>
@endif