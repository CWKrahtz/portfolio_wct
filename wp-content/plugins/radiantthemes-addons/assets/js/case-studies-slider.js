var WidgetRadiantcaseHandler = function ($scope, $) {
    var spacerSwiper = parseInt($('.rt-case-study-box1.swiper-container').attr("data-spacer"));
    var mobileItems = parseInt($('.rt-case-study-box1.swiper-container').attr("data-mobile-items"));
    var tabItems = parseInt($('.rt-case-study-box1.swiper-container').attr("data-tab-items"));
    var desktopItems = parseInt($('.rt-case-study-box1.swiper-container').attr("data-desktop-items"));
     var spaceBetweenPosts = parseInt($('.rt-case-study-box1.swiper-container').attr("data-spacer"));
   var swiper = new Swiper('.rt-case-study-box1.swiper-container', {
        slidesPerView: mobileItems,
        spaceBetween: spaceBetweenPosts,
        loop: true,
        allowTouchMove: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },		navigation: {          nextEl: ".swiper-button-next",          prevEl: ".swiper-button-prev",        },
        breakpoints: {
            640: {
                slidesPerView: mobileItems,
                spaceBetween: spaceBetweenPosts,
            },
            768: {
                slidesPerView: tabItems,
                spaceBetween: spaceBetweenPosts,
            },
            1024: {
                slidesPerView: desktopItems,
                spaceBetween: spaceBetweenPosts,
            },
        }
    });
};
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction("frontend/element_ready/radiant-case_studies_slider.default", WidgetRadiantcaseHandler);
});