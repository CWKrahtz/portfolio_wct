var WidgetRadiantcasestudyHandler = function ($scope, $) {
    if (document.querySelector('.case-study.swiper-container')) {
        var caseSlider = document.querySelector('.case-study.swiper-container');
        var mobileItemsSelector3 = parseInt(caseSlider.dataset.mobileItems);
        var tabItemsSelector3 = parseInt(caseSlider.dataset.tabItems);
        var desktopItemsSelector3 = parseInt(caseSlider.dataset.desktopItems);
        var postgapItemsSelector = parseInt(caseSlider.dataset.spacer);
    }

    var clientswiper = new Swiper('.case-study.swiper-container', {
        slidesPerView: mobileItemsSelector3,
        spaceBetween: postgapItemsSelector,
        loop: true,
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
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-case_studies.default",
        WidgetRadiantcasestudyHandler
    );
});