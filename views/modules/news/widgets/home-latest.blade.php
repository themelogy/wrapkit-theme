@if($posts->count()>0)
<div class="blog-home1 bg-light">
    <div class="container">
        <!-- Row  -->
        <div class="row justify-content-center">
            <!-- Column -->
            <div class="col-md-8 text-center">
                <h2 class="title p-b-0 m-b-0 text-themecolor">{{ trans('themes::news.title') }}</h2>
            </div>
        </div>
        <div class="row m-t-20">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card card-shadow">
                    <a href="{{ $post->url }}"><img class="card-img-top" src="{{ $post->present()->firstImage(350,200,'fit',70) }}" alt="{{ $post->title }}"></a>
                    <div class="p-30">
                        <div class="d-flex no-block font-14">
                            <a href="{{ $post->category->url }}">{{ $post->category->title }}</a>
                        </div>
                        <h5 class="font-medium"><a href="{{ $post->url }}" class="link">{{ $post->title }}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif