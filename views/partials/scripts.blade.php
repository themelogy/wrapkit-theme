<!-- This page slider css -->
{!! Theme::style('vendor/owl.carousel/assets/owl.theme.green.css') !!}
{!! Theme::style('vendor/flag-icon-css/css/flag-icon.min.css') !!}

{!! Asset::styles('footer') !!}
@stack('css-stack')
@stack('css-inline')

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
{!! Theme::script('vendor/tweenmax/TweenMax.min.js') !!}
{!! Theme::script('vendor/tweenmax/plugins/ScrollToPlugin.min.js') !!}

<!-- This is for the animation -->
{!! Theme::script('vendor/aos/aos.js') !!}
{!! Theme::script('js/jquery.touchSwipe.min.js') !!}
{!! Theme::script('vendor/bootstrap-touch-slider/bootstrap-touch-slider.js') !!}
{!! Theme::script('vendor/owl.carousel/owl.carousel.min.js') !!}
@stack('script-stack')
{!! Asset::js('footer') !!}

<!--Custom JavaScript -->
{!! Theme::script('js/custom.min.js') !!}

@stack('js-inline')

{!! Theme::style('vendor/bootstrap-select/css/bootstrap-select.min.css') !!}
{!! Theme::script('vendor/bootstrap-select/js/bootstrap-select.min.js') !!}
<script>
    $(document).ready(function () {
        if(typeof $.fn.selectpicker !== 'undefined') {
            $('.selectpicker').selectpicker();
        }
    });
</script>