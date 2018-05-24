@php
    $img = (object)[
        'width'    => $page->settings->image_width ?? 400,
        'height'   => $page->settings->image_height ?? null,
        'mode'     => $page->settings->image_mode ?? 'fit',
        'quality'  => $page->settings->image_quality ?? 80,
        'position' => $page->settings->image_position ?? null,
        'show'     => $page->settings->show_image ?? null,
        'margin'   => 20
    ];
    $class = collect(['img-thumbnail']);
    switch ($img->position) {
        case 'top':
            $class->push('img-responsive m-b-20');
            break;
        case 'bottom':
            $class->push('img-responsive m-t-20');
            break;
        case 'left':
            $class->push('float-left m-r-20 m-b-20');
            break;
        case 'right':
        $class->push('float-right m-l-20 m-b-20');
        break;
        default:
        $class->push('m-b-20');
    }
    $image          = $page->present()->firstImage($img->width, $img->height, $img->mode, $img->quality);
    $html_image     = Html::image($image, $page->title, ['class'=>$class->implode(' ')]);
    $body           = in_array($img->position, ['','left','right','top']) ? $html_image.$page->body : $page->body.$html_image;
@endphp

@if(@$page->settings->show_docs)
    @include('page::widgets.documents')
@elseif($img->show && $image)
    {!! $body !!}
@else
    {!! $page->body !!}
@endif
@include('page::partials.widgets')