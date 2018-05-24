@if($page->files->count()>0)
    @php
        $setting = (object)[
            'width'         => $page->settings->image_width ?? 400,
            'height'        => $page->settings->image_height ?? null,
            'mode'          => $page->settings->image_mode ?? 'fit',
            'quality'       => $page->settings->image_quality ?? 80,
            'thumb_width'   => floor($page->settings->image_width / 2),
            'thumb_height'  => null
        ];
        $images = collect();
        $count = 0; $i=0;
        static $arr = [];
        foreach ($page->files as $file) {
            if(++$count % 2 === 0) {
            $arr['big'] = Imagy::getImage($file->filename, 'pageImage', ['width'=>$setting->width, 'height'=>$setting->height, 'mode'=>$setting->mode, 'quality'=>$setting->quality]);
            } else {
            $arr['cover'] = Imagy::getImage($file->filename, 'pageThumb', ['width'=>$setting->thumb_width, 'height'=>$setting->thumb_height, 'mode'=>'resize', 'quality'=>$setting->quality]);
            continue;
            }
            $images->push((object)$arr);
            unset($arr);
        }
    @endphp

    @foreach($images->chunk(4) as $chunk)
    <div class="row">
        @foreach($chunk as $image)
        <div class="col-md-3">
            <a href="{{ $image->big }}" data-lightbox="image-1" data-title="{{ $page->title }}"><img class="img-thumbnail" src="{{ $image->cover }}" /></a>
        </div>
        @endforeach
    </div>
    @endforeach

    @push('css-stack')
        {!! Theme::style('vendor/lightbox2/css/lightbox.min.css') !!}
    @endpush

    @push('script-stack')
        {!! Theme::script('vendor/lightbox2/js/lightbox.min.js') !!}
    @endpush
@endif