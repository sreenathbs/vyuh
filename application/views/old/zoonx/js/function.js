// ======================================================
//LOADER
$(window).on("load", function () {
    "use strict";
    $(".loader").fadeOut(800);

});


jQuery(function ($) {
    "use strict";



    // ======================================================
    //Menu  Scroll
    // ======================================================
    $(".scroll").on("click", function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1500);
    });
    var offset = 650;
    var duration = 300;
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > offset) {
            $(".back-to-top").fadeIn(200);
        } else {
            $(".back-to-top").fadeOut(200);
        }
    });

    // ======================================================
    //Full Screen
    // ======================================================
    function resizebanner() {
        $(".fullscreen").css("height", $(window).height());
        $(".fullscreen").css("width", $(window).width());
    }
    $(window).resize(function () {
        resizebanner();
    });
    resizebanner();

    // ======================================================
    //MENU Fixed
    // ======================================================
    $(window).scroll(function () {
        var $scroll = $(window).scrollTop();
        var $navbar = $(".navbar.bootsnav");
        if (!$navbar.hasClass("navbar-sidebar")) {
            if ($scroll > 120) {
                $navbar.addClass("fixey");
            } else {
                $navbar.removeClass("fixey");
            }
        }

    });

    // ======================================================
    //Pgrogress bars
    // ======================================================

    $(".barwrapper").appear(function () {
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'manual'
        }).tooltip('show');

        $(".progress-bar").each(function () {
            var each_bar_width = $(this).attr("aria-valuenow");
            $(this).width(each_bar_width + "%");
        });
    });


    // ======================================================
    //FUN FACT
    // ======================================================
    $(".number-counters").appear(function () {
        $(".number-counters [data-to]").each(function () {
            var e = $(this).attr("data-to");
            $(this).delay(6e3).countTo({
                from: 1,
                to: e,
                speed: 3000,
                refreshInterval: 50
            })
        })
    });

    

    // ======================================================
    //Owl Carousel
    // ======================================================
    /*Latest News / blog*/
    $("#latest_slider").owlCarousel({
        autoPlay: 3000,
        loop: true,
        autoplayHoverPause: true,
        dots: false,
        nav: false,
        margin: 30,
        items: 3,
        responsive: {
            1200: {
                items: 3,
            },
            768: {
                items: 2,
            },
            480: {
                items: 1,
            },
        },
    });

    /*Testimonial Fading*/
    $("#testinomial_rotator").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        items: 1,
        loop: true,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
        }
    });

    /*Clients logo*/
    $("#client_slider").owlCarousel({
        autoPlay: 3000,
        nav: false,
        items: 5,
        responsive: {
            1024: {
                items: 5,
            },
            980: {
                items: 3,
            },
            0: {
                items: 1,
            },
        }
    });



    // ======================================================
    //Revolution Slider
    // ======================================================
    /*Revolution*/
    $("#rev-slider").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        delay: 4000,
        navigation: {
            keyboardNavigation: "on",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            onHoverStop: "on",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            bullets: {
                style: "",
                enable: true,
                rtl: false,
                hide_onmobile: false,
                hide_onleave: false,
                hide_under: 320,
                hide_over: 9999,
                tmp: '',
                direction: "horizontal",
                space: 10,
                h_align: "center",
                v_align: "bottom",
                h_offset: 15,
                v_offset: 30
            },
            arrows: {
                enable: false,
                hide_onmobile: true,
                hide_onleave: false,
                hide_under: 767,

            },

        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%"
        },
        responsiveLevels: [1240, 1024, 778, 480],
        gridwidth: [1280, 992, 767, 480],
        gridheight: [860, 760, 400, 380],
        disableProgressBar: "off",
        spinner: "off",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 8, 7, 12, 16, 10, 50],
        },
    });
    $("#rev-errows").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullwidth",
        delay: 4000,
        navigation: {
            keyboardNavigation: "on",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            onHoverStop: "on",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            bullets: {
                style: "",
                enable: false,
                rtl: false,
                hide_onmobile: false,
                hide_onleave: false,
                hide_under: 320,
                hide_over: 9999,
                tmp: '',
                direction: "horizontal",
                space: 10,
                h_align: "center",
                v_align: "bottom",
                h_offset: 15,
                v_offset: 30
            },
            arrows: {
                style: "",
                enable: true,
                hide_onmobile: true,
                hide_onleave: false,
                hide_under: 767,
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 30,
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 30
                },
            },

        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%"
        },
        responsiveLevels: [1240, 1024, 778, 480],
        gridwidth: [1280, 992, 767, 480],
        gridheight: [860, 760, 400, 380],
        disableProgressBar: "off",
        spinner: "off",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 8, 7, 12, 16, 10, 50],
        },
    });




    // ======================================================
    //CUBEPORTFOLIO
    // ======================================================
    $("#projects").cubeportfolio({
        filters: "#project-filter",
        layoutMode: "grid",
        defaultFilter: "*",
        animationType: "slideDelay",
        gapHorizontal: 30,
        gapVertical: 30,
        gridAdjustment: "responsive",
        lightboxDelegate: ".cbp-lightbox",
        lightboxGallery: true,
    });

    /*gallery grid layout 4cols*/
    $("#work-gallery").cubeportfolio({
        filters: "#work-filters",
        layoutMode: "grid",
        defaultFilter: '*',
        animationType: "fadeOut",
        gapHorizontal: 30,
        gapVertical: 30,
        gridAdjustment: "responsive",
        mediaQueries: [{
            width: 1500,
            cols: 4
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        displayType: "fadeIn",
        displayTypeSpeed: 400,
    });

    /*Measonry Grid*/
    $("#measonry-gallery").cubeportfolio({
        filters: "#measonry-filters",
        layoutMode: "grid",
        defaultFilter: '*',
        animationType: "fadeOut",
        gapHorizontal: 30,
        gapVertical: 30,
        gridAdjustment: "responsive",
        mediaQueries: [{
            width: 1500,
            cols: 3
        }, {
            width: 1100,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        displayType: "fadeIn",
        displayTypeSpeed: 400,
    });



    // ======================================================
    //PARALLAX
    // ======================================================
    $(".parallaxie").parallaxie({
        speed: 0.6,
        offset: 0,
    });
    
    
    $('#particles').particleground({
    dotColor: '#fff',
    lineColor: 'rgba(255,255,255,.75)'
  });
    

});