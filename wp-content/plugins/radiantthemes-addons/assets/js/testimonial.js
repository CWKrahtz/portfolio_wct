var WidgetRadiantTestimonialHandler = function ($scope, $) {

if (document.querySelector('.rt-testimonial.swiper-container.element-six')) {
        var clientSlider = document.querySelector('.rt-testimonial.swiper-container.element-six');
        var mobileItemsSelector3 = parseInt(clientSlider.dataset.mobileItems);
        var tabItemsSelector3 = parseInt(clientSlider.dataset.tabItems);
        var desktopItemsSelector3 = parseInt(clientSlider.dataset.desktopItems);
        var postgapItemsSelector = parseInt(clientSlider.dataset.spacer);
    

    var clientswiper = new Swiper('.rt-testimonial.swiper-container.element-six', {
        slidesPerView: mobileItemsSelector3,
        spaceBetween: postgapItemsSelector,
        loop: true,
        pagination: {
            el: '.swiper-dot',
             clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            768: {
                slidesPerView: tabItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
        }
    });
}
if (document.querySelector('.rt-testimonial.swiper-container.element-one')) {
        var clientSlider = document.querySelector('.rt-testimonial.swiper-container.element-one');
        var mobileItemsSelector3 = parseInt(clientSlider.dataset.mobileItems);
        var tabItemsSelector3 = parseInt(clientSlider.dataset.tabItems);
        var desktopItemsSelector3 = parseInt(clientSlider.dataset.desktopItems);
        var postgapItemsSelector = parseInt(clientSlider.dataset.spacer);
    

    var clientswiper = new Swiper('.rt-testimonial.swiper-container.element-one', {
        slidesPerView: mobileItemsSelector3,
        spaceBetween: postgapItemsSelector,
        loop: true,
        pagination: {
            el: '.swiper-dot2',
             clickable: true,
        },
		navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
		},
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            768: {
                slidesPerView: tabItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
        }
    });
}
if (document.querySelector('.rt-testimonial.swiper-container.element-four')) {
        var clientSlider = document.querySelector('.rt-testimonial.swiper-container.element-four');
        var mobileItemsSelector3 = parseInt(clientSlider.dataset.mobileItems);
        var tabItemsSelector3 = parseInt(clientSlider.dataset.tabItems);
        var desktopItemsSelector3 = parseInt(clientSlider.dataset.desktopItems);
        var postgapItemsSelector = parseInt(clientSlider.dataset.spacer);
    

    var clientswiper = new Swiper('.rt-testimonial.swiper-container.element-four', {
        slidesPerView: mobileItemsSelector3,
        spaceBetween: postgapItemsSelector,
        loop: true,
        pagination: {
            el: '.swiper-dot',
             clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            768: {
                slidesPerView: tabItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
        }
    });
}
if (document.querySelector('.rt-testimonial.swiper-container.element-three')) {
        var clientSlider = document.querySelector('.rt-testimonial.swiper-container.element-three');
        var mobileItemsSelector3 = parseInt(clientSlider.dataset.mobileItems);
        var tabItemsSelector3 = parseInt(clientSlider.dataset.tabItems);
        var desktopItemsSelector3 = parseInt(clientSlider.dataset.desktopItems);
        var postgapItemsSelector = parseInt(clientSlider.dataset.spacer);
    

    var clientswiper = new Swiper('.rt-testimonial.swiper-container.element-three', {
        slidesPerView: mobileItemsSelector3,
        spaceBetween: postgapItemsSelector,
        loop: true,
        pagination: {
            el: '.swiper-dot',
             clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            768: {
                slidesPerView: tabItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
        }
    });
}

else {


    var spacerSwiper = parseInt($('.testimonial.swiper-container').attr("data-spacer"));
    var mobileItems = parseInt($('.testimonial.swiper-container').attr("data-mobile-items"));
    var tabItems = parseInt($('.testimonial.swiper-container').attr("data-tab-items"));
    var desktopItems = parseInt($('.testimonial.swiper-container').attr("data-desktop-items"));
    var testimonialSwiper = new Swiper('.testimonial.swiper-container', {
        slidesPerView: mobileItems,
        spaceBetween: spacerSwiper,
       // loop: true,
       
        pagination: {
            el: '.swiper-pagination',
              type: "fraction",
        },
        navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
        breakpoints: {
            640: {
                slidesPerView: mobileItems,
            },
            768: {
                slidesPerView: tabItems,
            },
            1024: {
                slidesPerView: desktopItems,
            },
        }
    });

    var spacerSwiper = parseInt($('.testimonial3.swiper-container').attr("data-spacer"));
    var mobileItems = parseInt($('.testimonial3.swiper-container').attr("data-mobile-items"));
    var tabItems = parseInt($('.testimonial3.swiper-container').attr("data-tab-items"));
    var desktopItems = parseInt($('.testimonial3.swiper-container').attr("data-desktop-items"));
    var testimonialSwiper = new Swiper('.testimonial3.swiper-container', {
        slidesPerView: mobileItems,
        spaceBetween: spacerSwiper,
        loop: true,
        pagination: {
            el: '.swiper-dot',
             clickable: true,
        },
       
        breakpoints: {
            640: {
                slidesPerView: mobileItems,
            },
            768: {
                slidesPerView: tabItems,
            },
            1024: {
                slidesPerView: desktopItems,
            },
        }
    });

    var spacerSwiper = parseInt($('.testimonial5.swiper-container').attr("data-spacer"));
    var mobileItems = parseInt($('.testimonial5.swiper-container').attr("data-mobile-items"));
    var tabItems = parseInt($('.testimonial5.swiper-container').attr("data-tab-items"));
    var desktopItems = parseInt($('.testimonial5.swiper-container').attr("data-desktop-items"));
    var testimonialSwiper = new Swiper('.testimonial5.swiper-container', {
        slidesPerView: 1,
        spaceBetween: spacerSwiper,
       
         lazy: true,
    loop: true,
    speed: 2000,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
        pagination: {
            el: '.swiper-dot2',
             clickable: true,
        },
       
        breakpoints: {
            640: {
                slidesPerView: mobileItems,
            },
            768: {
                slidesPerView: tabItems,
            },
            1024: {
                slidesPerView: desktopItems,
            },
        }
    });

   
}
    // jQuery(document).ready(function($) {
            // "use strict";
            // TESTIMONIALS CAROUSEL HOOK
           // jQuery('#testimonial_grid').slideCarousel({
                // loop: true,
                // center: true,
                // items: 3,
                // margin: 0,
                // autoplay: jQuery('#testimonial_grid').data("autoplay"),
                // dots: jQuery('#testimonial_grid').data("dots"),
                // autoplayTimeout: 8500,
                // smartSpeed: 450,
                // responsive: {
                    // 0: {
                        // items: jQuery('#testimonial_grid').data("mobile-items")
                    // },
                    // 768: {
                        // items: jQuery('#testimonial_grid').data("tab-items")
                    // },
                    // 1170: {
                        // items: jQuery('#testimonial_grid').data("desktop-items")
                    // }
                // }
            // });
        // });
};
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction("frontend/element_ready/radiant-testimonial.default", WidgetRadiantTestimonialHandler);
});