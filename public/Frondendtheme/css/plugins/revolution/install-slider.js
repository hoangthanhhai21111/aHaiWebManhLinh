jQuery(function(e) {
    "use strict";
    if (e("#rs-slider").length) {
        var i, o = jQuery;
        o(document).ready(function() {
            void 0 == o("#rs-slider").revolution ? revslider_showDoubleJqueryError("#rs-slider") : i = o("#rs-slider").show().revolution({
                sliderLayout: "standar",
                fullScreenOffset: "15%",
                delay: 4e3,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: !1
                    },
                    arrows: {
                        style: "zeus",
                        enable: !0,
                        tmp: '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>',
                        hide_onmobile: !0,
                        hide_onleave: !1,
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 25,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 25,
                            v_offset: 0
                        }
                    },
                    bullets: {
                        enable: !0,
                        style: "hebe",
                        tmp: '<span class="tp-bullet-image"></span>',
                        hide_onmobile: !0,
                        hide_onleave: !1,
                        hide_under: 0,
                        direction: "horizontal",
                        h_align: "right",
                        v_align: "bottom",
                        space: 6,
                        h_offset: 30,
                        v_offset: 20
                    }
                },
                gridwidth: 1700,
                gridheight: 640,
                minHeight: 340,
                parallax: {
                    type: "scroll",
                    origo: "enterpoint",
                    speed: 400,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50]
                }
            })
        })
    }
});