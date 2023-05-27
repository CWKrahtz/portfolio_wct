var WidgetRadiantProductHandler = function ($scope, $) {
if (document.querySelector('.product-box.swiper-container')) {
    var productSlider = document.querySelector('.product-box.swiper-container');
    var mobileItemsSelector = parseInt(productSlider.dataset.mobileItems);
    var tabItemsSelector = parseInt(productSlider.dataset.tabItems);
    var desktopItemsSelector = parseInt(productSlider.dataset.desktopItems);
    var spacepostSelector = parseInt(productSlider.dataset.spacer);
}

var swiper = new Swiper('.product-box.swiper-container', {
    slidesPerView: mobileItemsSelector,
    spaceBetween: spacepostSelector,
    loop: true,
	pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
		navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
    breakpoints: {
        640: {
            slidesPerView: mobileItemsSelector,
            spaceBetween: spacepostSelector,
        },
        768: {
            slidesPerView: tabItemsSelector,
            spaceBetween: spacepostSelector,
        },
        1024: {
            slidesPerView: desktopItemsSelector,
            spaceBetween: spacepostSelector,
        },
    }
});

}

jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-product.default",
        WidgetRadiantProductHandler
    );
});