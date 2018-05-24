/*
Template Name: Wrapkit Ui Kit
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
    "use strict";
    // ============================================================== 
    //This is for preloader
    // ============================================================== 
    $(function () {
        $(".preloader").fadeOut();
    });
    // ============================================================== 
    //Tooltip
    // ============================================================== 
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    // ============================================================== 
    // For mega menu
    // ============================================================== 
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    }); 
     jQuery(document).on('click', '.navbar-nav > .dropdown', function(e) {
         e.stopPropagation();
    });
    $(".dropdown-submenu").click(function(){
              $(".dropdown-submenu > .dropdown-menu").toggleClass("show in");
    }); 
    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize");
    // ============================================================== 
    //Fix header while scroll
    // ============================================================== 
    var wind = $(window);
    wind.on("load", function() {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".topbar");
        if (bodyScroll > 100) {
            navbar.addClass("fixed-header animated slideInDown")
        } else {
            navbar.removeClass("fixed-header animated slideInDown")
        }
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.topbar').addClass('fixed-header animated slideInDown');
            $('.bt-top').addClass('visible');
        } else {
            $('.topbar').removeClass('fixed-header animated slideInDown');
            $('.bt-top').removeClass('visible');
        }
    });
    // ============================================================== 
    // Animation initialized
    // ============================================================== 
    AOS.init();
    // ============================================================== 
    // Back to top
    // ============================================================== 
    $('.bt-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });

    $('.client-box').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1

            },
            720: {
                items: 3
            },
            940: {
                items: 5
            },
            1280: {
                items: 8
            }
        }
    });


    /* ------------------------------------------------------------------------
     Smooth Scroll
     ------------------------------------------------------------------------ */
    var $window = $(window);

    var scrollTime = 0.6;
    var scrollDistance = 355;

    $window.on("mousewheel DOMMouseScroll", function(event){

        event.preventDefault();

        var delta = event.originalEvent.wheelDelta/125 || -event.originalEvent.detail/3;
        var scrollTop = $window.scrollTop();
        var finalScroll = scrollTop - parseInt(delta*scrollDistance);

        TweenMax.to($window, scrollTime, {
            scrollTo : { y: finalScroll, autoKill:true },
            ease: Power1.easeOut,
            autoKill: true,
            overwrite: 5
        });
    });
});
