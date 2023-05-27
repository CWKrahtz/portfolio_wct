var WidgetRadiantProductCatHandler = function ($scope, $) {
if (document.querySelector('.rt-product-cat.swiper-container')) {
    var productSlider1 = document.querySelector('.rt-product-cat.swiper-container');
    var mobileItemsSelector1 = parseInt(productSlider1.dataset.mobileItems);
    var tabItemsSelector1 = parseInt(productSlider1.dataset.tabItems);
    var desktopItemsSelector1 = parseInt(productSlider1.dataset.desktopItems);
    var spacepostSelector1 = parseInt(productSlider1.dataset.spacer);
}

var swiper = new Swiper('.rt-product-cat.swiper-container', {
    slidesPerView: mobileItemsSelector1,
    spaceBetween: spacepostSelector1,
    loop: true,
	pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
		navigation: {
                nextEl: ".swiper-button-next-cat",
                prevEl: ".swiper-button-prev-cat"
            },
    breakpoints: {
        640: {
            slidesPerView: mobileItemsSelector1,
            spaceBetween: spacepostSelector1,
        },
        768: {
            slidesPerView: tabItemsSelector1,
            spaceBetween: spacepostSelector1,
        },
        1024: {
            slidesPerView: desktopItemsSelector1,
            spaceBetween: spacepostSelector1,
        },
    }
});

}
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-product-cat.default",
        WidgetRadiantProductCatHandler
    );
});