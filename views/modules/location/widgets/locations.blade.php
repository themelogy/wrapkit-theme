<div class="container locations">
    <div class="row">
        <div class="col-md-6">
            <h3 class="fs-sm-11">{{ trans('themes::location.title.offices') }}</h3>
        </div>
        <div class="col-md-6">
            <div class="office-grid-navigation"> <a class="prev"><i class="fa fa-angle-left"></i></a> <a class="next"><i class="fa fa-angle-right"></i></a></div>
        </div>
    </div>
    <div class="office-grid owl-carousel">
        @foreach($locations as $location)
            <div class="item">
                <div class="office-item">
                    <div class="office-title">
                        <h3 class="fs-sm-11">{{ $location->name }}</h3>
                    </div>
                    <div class="office-desc">
                        <div class="d-flex no-block">
                            <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                            <div class="info">
                                <p>{{ $location->present()->address }}</p>
                            </div>
                        </div>
                        @if($location->phone1)
                            <div class="d-flex no-block">
                                <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                                <div class="info">
                                    <span class="font-medium db m-t-5">{{ $location->phone1 }}</span>
                                </div>
                            </div>
                        @endif
                        @if($location->fax)
                            <div class="d-flex no-block">
                                <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Fax"></i></div>
                                <div class="info">
                                    <span class="font-medium db m-t-5">{{ $location->fax }}</span>
                                </div>
                            </div>
                        @endif
                        @if($location->email)
                            <div class="d-flex no-block">
                                <div class="font-20 m-t-5 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                                <div class="info">
                                    <a href="#" class="font-medium text-themecolor db m-t-5">{{ $location->email }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="office-map">
                        <div id="map{{ $location->id }}"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('js-inline')
    <script>
        function initMap() {
            @foreach($locations as $location)
            var coordinate{{ $location->id }} = {lat: {{ $location->lat }}, lng: {{ $location->long }} };
            var map{{ $location->id }} = new google.maps.Map(document.getElementById('map{{ $location->id }}'), {
                zoom: 15,
                center: coordinate{{ $location->id }}
            });
            var marker{{ $location->id }} = new google.maps.Marker({
                position: coordinate{{ $location->id }},
                map: map{{ $location->id }},
                icon: "{{ Theme::url('images/favicon.png') }}"
            });
            @endforeach
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpvcV4WyemrP7OUfrDuXTkEaazIzwqe1U&callback=initMap&language={{ locale() }}"></script>
    <script>
        jQuery(document).ready(function () {
            var address_grid = $('.office-grid').owlCarousel({
                loop: false,
                nav: false,
                dots: false,
                margin:20,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
            $(".office-grid-navigation .prev").click(function () {
                address_grid.trigger('prev.owl.carousel');
            });

            $(".office-grid-navigation .next").click(function () {
                address_grid.trigger('next.owl.carousel');
            });
        });
    </script>
@endpush