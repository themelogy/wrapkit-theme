<div class="container">
    <div class="row">
        <div class="col-md-9 {{ @$page->parent->settings->show_menu_location == 'left' ? 'order-md-9' : '' }}">
            @include('page::partials.image', ['page'=>$page])
        </div>
        <div class="col-md-3 {{ @$page->parent->settings->show_menu_location == 'left' ? 'order-md-3' : '' }} sidebar">
            @parentMenu(@$page->parent)
        </div>
    </div>
</div>