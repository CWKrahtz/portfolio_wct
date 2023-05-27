var WidgetRadiantBlogHandler = function ($scope, $) {
if (document.querySelector('.blog.swiper-container')) {
    var blogSlider = document.querySelector('.blog.swiper-container');
    var mobileItemsSelector = blogSlider.dataset.mobileItems;
    var tabItemsSelector = blogSlider.dataset.tabItems;
    var desktopItemsSelector = blogSlider.dataset.desktopItems;
    
    
} else{
    var blogSlider = 'test';
    var mobileItemsSelector = 3;
    var tabItemsSelector = 2;
    var desktopItemsSelector = 1;
}
var swiper = new Swiper('.blog.swiper-container', {
    slidesPerView: mobileItemsSelector,
   // spaceBetween: 30,
    loop: true,
    allowTouchMove: true,
    // init: false,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },	navigation: {          nextEl: ".swiper-button-next",          prevEl: ".swiper-button-prev",        },
    breakpoints: {
        640: {
            slidesPerView: mobileItemsSelector,
           // spaceBetween: 30,
        },
        768: {
            slidesPerView: tabItemsSelector,
            //spaceBetween: 30,
        },
        1024: {
            slidesPerView: desktopItemsSelector,
            //spaceBetween: 30,
        },
    }
});
}
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-blog.default",
		WidgetRadiantBlogHandler
	);
});