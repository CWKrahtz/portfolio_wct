(function ($) {
    "use strict";
    jQuery(document).on("ready", function () {
        
		if (jQuery( "#menu-main-menu-1" ).hasClass( "menu-item-has-children" )) {
			(".rt-dropdown, .rt-dropdown-submenu , .menu-item-has-children").prepend('<span class="rt-dropdown-arrow"></span>');
		}
			var $form_modal = $('.cd-user-modal'),
		$form_login = $form_modal.find('#cd-login'),
		$form_signup = $form_modal.find('#cd-signup'),
		$form_forgot_password = $form_modal.find('#cd-reset-password'),
		$form_modal_tab = $('.cd-switcher'),
		$tab_login = $form_modal_tab.children('li').eq(0).children('a'),
		$tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
		$forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
		$back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
		$main_nav = $('.main-nav');
	//open modal
	$main_nav.on('click', function(event){
		if( $(event.target).is($main_nav) ) {
			// on mobile open the submenu
			$(this).children('ul').toggleClass('is-visible');
		} else {
			// on mobile close submenu
			$main_nav.children('ul').removeClass('is-visible');
			//show modal layer
			$form_modal.addClass('is-visible');
			//show the selected form
			( $(event.target).is('.cd-signup') ) ? signup_selected() : login_selected();
		}
	});
	//close modal
	$('.cd-user-modal').on('click', function(event){
		if( $(event.target).is($form_modal) || $(event.target).is('.cd-close-form') ) {
			$form_modal.removeClass('is-visible');
		}
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$form_modal.removeClass('is-visible');
	    }
    });
	//switch from a tab to another
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
	});
	//hide or show password
	$('.hide-password').on('click', function(){
		var $this= $(this),
			$password_field = $this.prev('input');
		( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		( 'Hide' == $this.text() ) ? $this.text('Show') : $this.text('Hide');
		//focus and move cursor to the end of input field
		$password_field.putCursorAtEnd();
	});
	//show forgot-password form
	$forgot_password_link.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});
	//back to login from the forgot-password form
	$back_to_login_link.on('click', function(event){
		event.preventDefault();
		login_selected();
	});
	function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
	}
	function signup_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
	}
	function forgot_password_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
	}
	//REMOVE THIS - it's just to show error messages
	$form_login.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		$form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});
	$form_signup.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		$form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});
        jQuery(window).on("scroll", function () {
            if (jQuery(this).scrollTop() > 100) {
                jQuery(".scrollup").addClass("active");
            } else {
                jQuery(".scrollup").removeClass("active");
            }
        });
        jQuery(".scrollup").on("click", function () {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        // $('input[name=s]').focus();
        $('select.rt-selectbox, select.mptt-navigation-select, .widget_archive select, .widget_categories select, .widget_text select, .wp-block-archives-dropdown select, .wp-block-categories-dropdown select').each(function (index) {
            $(this).each(function () {
                var $el = $(this);
                $el.insertBefore($el.parent('.rt-select-wrapper'));
                $el.next('.rt-select-wrapper').remove();
                $el.css({
                    'opacity': 0,
                    'position': 'absolute',
                    'left': 0,
                    'right': 0,
                    'top': 0,
                    'bottom': 0
                });
                var $comboWrap = $('<span class="rt-select-wrapper" />').insertAfter($el);
                var $text = $('<span class="rt-select-text" />').appendTo($comboWrap);
                var $button = $('<span class="rt-select-button" />').appendTo($comboWrap);
                $el.appendTo($comboWrap);
                $el.change(function () {
                    $text.text($('option:selected', $el).text());
                });
                $text.text($('option:selected', $el).text());
                $el.comboWrap = $comboWrap;
            });
        });
        var swiper = new Swiper('.related-product-box.swiper-container', {
    spaceBetween: 15,
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
        0: {
            slidesPerView: 2,
        },
        640: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 5,
        },
    }
});
        jQuery(".header-flyout-searchbar i, .header-flyout-searchbar span[class*='ti-']").on("click", function () {
            jQuery("body").toggleClass("flyout-searchbar-active");
        });
        jQuery(".flyout-search-close").on("click", function () {
            jQuery("body").removeClass("flyout-searchbar-active");
        });
        jQuery(".comments-area .comment-form > p input[type='submit']").each(function () {
            jQuery(this).replaceWith("<button type='submit'><span>" + jQuery(this).attr("value") + "</span></button>");
        });
        jQuery(".comments-area .comment-form > p input[type='reset']").each(function () {
            jQuery(this).replaceWith("<button type='reset'><span>" + jQuery(this).attr("value") + "</span></button>");
        });
        jQuery("[data-toggle='tooltip']").tooltip();
        jQuery(".header-responsive-nav").each(function () {
            jQuery(this).sidr({
                side: 'right',
                speed: 600,
                displace: false,
                renaming: false,
                source: '.mobile-menu',
                name: 'mobile-menu',
                onOpen: function () {
                    jQuery("body").addClass("mobile-menu-open");
                },
                onClose: function () {
                    jQuery("body").removeClass("mobile-menu-open");
                },
            });
            jQuery(".mobile-menu-close, .overlay").on("click", function () {
                jQuery.sidr('close', 'mobile-menu');
            });
        });
        jQuery(".header-hamburger-menu").each(function () {
            jQuery(this).sidr({
                side: 'right',
                speed: 400,
                displace: false,
                renaming: false,
                source: '.hamburger-menu-holder',
                name: 'hamburger-menu',
                onOpen: function () {
                    jQuery("body").addClass("hamburger-menu-open");
                },
                onClose: function () {
                    jQuery("body").removeClass("hamburger-menu-open");
                },
            });
            jQuery(".hamburger-menu-close-lines").on("click", function () {
                jQuery.sidr('close', 'hamburger-menu');
            });
        });
        jQuery(".responsive-sidemenu-open").each(function () {
            jQuery(this).sidr({
                side: 'left',
                speed: 600,
                displace: false,
                renaming: false,
                source: '.sidemenu-holder',
                name: 'sidemenu',
                onOpen: function () {
                    jQuery("body").addClass("sidemenu-open");
                },
                onClose: function () {
                    jQuery("body").removeClass("sidemenu-open");
                },
            });
            jQuery(".responsive-sidemenu-close").on("click", function () {
                jQuery.sidr('close', 'sidemenu');
            });
        });
        jQuery(".header-sidebar-menu-open, .mobile-sidebar-menu-open").each(function () {
            jQuery(this).sidr({
                side: 'left',
                speed: 300,
                displace: false,
                renaming: false,
                source: '.sidemenu-holder',
                name: 'sidemenu',
                onOpen: function () {
                    jQuery("body").addClass("sidemenu-open");
                },
                onClose: function () {
                    jQuery("body").removeClass("sidemenu-open");
                },
            });
            jQuery(".sidemenu-close").on("click", function () {
                jQuery.sidr('close', 'sidemenu');
            });
        });
        jQuery(".header-flyout-menu").on("click", function () {
            jQuery("body").addClass("flyout-menu-active");
        });
        jQuery(".flyout-menu-close").on("click", function () {
            jQuery("body").removeClass("flyout-menu-active");
        });
        jQuery(".header-slideout-menu").on("click", function () {
            jQuery("body").addClass("slideout-menu-active");
        });
        jQuery(".slideout-menu-close").on("click", function () {
            jQuery("body").removeClass("slideout-menu-active");
        });
        jQuery(".header-flexi-menu").on("click", function () {
            jQuery("body").addClass("flexi-menu-active");
        });
        jQuery(".flexi-menu-close").on("click", function () {
            jQuery("body").removeClass("flexi-menu-active");
        });
        jQuery(".sidr .menu-item-has-children").each(function () {
            jQuery(this).children("ul, .rt-mega-menu, div ul").css({
                "display": "none",
            });
            jQuery(this).append("<span class='radiantthemes-open-submenu'></span>");
            jQuery(this).find(".radiantthemes-open-submenu").on("click", function () {
                jQuery(this).parent(".menu-item-has-children").toggleClass("radiantthemes-menu-open");
                jQuery(this).parent(".menu-item-has-children").children("ul, .rt-mega-menu").slideToggle(700);
            });
        });
        jQuery("body[data-page-transition='1'] a:not(.fancybox):not(.video-link):not([data-fancybox])").each(function () {
            jQuery(this).on("click", function (event) {
                let PageLink = jQuery(this).attr("href");
                if ("#" == PageLink) {} else if (PageLink.startsWith("#")) {} else {
                    event.preventDefault();
                    jQuery("body").addClass("page-transition-active");
                    setTimeout(function () {
                        window.location.href = PageLink;
                    }, 700);
                }
            });
        });
        jQuery(".wraper_shop_single.style-one .shop_single .quantity input[type=number]").each(function () {
            jQuery(this).addClass("form-control");
            jQuery(this).parent().addClass("input-group");
            jQuery(this).before("<div class='input-group-addon quantity-decrease'></div>");
            jQuery(this).after("<div class='input-group-addon quantity-increase'></div>");
            jQuery(this).parent().find(".quantity-decrease").on("click", function () {
                if (jQuery(this).parent().find("input[type=number]").val() == jQuery(this).parent().find("input[type=number]").attr("min")) {
                    alert("Sorry! You're already on lowest value.");
                } else {
                    jQuery(this).parent().find("input[type=number]").val(+jQuery(this).parent().find("input[type=number]").val() - 1);
                }
            });
            jQuery(this).parent().find(".quantity-increase").on("click", function () {
                jQuery(this).parent().find("input[type=number]").val(+jQuery(this).parent().find("input[type=number]").val() + 1);
            });
        });
        jQuery(".radiantthemes-cart .woocommerce-cart-form .quantity input[type=number]").each(function () {
			jQuery(this).addClass("form-control");
			jQuery(this).parent().addClass("input-group");
			jQuery(this).before("<div class='input-group-addon quantity-decrease'>-</div>");
			jQuery(this).after("<div class='input-group-addon quantity-increase'>+</div>");
			jQuery(this).parent().find(".quantity-decrease").on("click", function () {
				if (jQuery(this).parent().find("input[type=number]").val() == jQuery(this).parent().find("input[type=number]").attr("min")) {
					e.preventDefault();
				} else {
					jQuery(this).parent().find("input[type=number]").val(+jQuery(this).parent().find("input[type=number]").val() - 1);
				}
			});
			jQuery(this).parent().find(".quantity-increase").on("click", function () {
				jQuery(this).parent().find("input[type=number]").val(+jQuery(this).parent().find("input[type=number]").val() + 1);
			});
		});
        /* Change cart item quantity */
        $(document).on('change', '.hamburger-minicart .qty', function () {
            var $thisInput = $(this).parent().parent().parent().find('img');
            var product_qty = $(this).val();
            var currentVal = parseFloat(product_qty);
            var cart_item_key = $(this).attr('name').replace('cart[', '').replace('][qty]', '');
            $('.woocommerce-message').remove();
            var data = {
                action: 'radiant_woocommerce_ajax_add_to_cart',
                quantity_two: currentVal,
                cart_item_key: cart_item_key
            };
            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,
                data: data,
                beforeSend: function (response) {
                    $thisInput.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $thisInput.removeClass('loading').addClass('added');
                },
                success: function (response) {
                    if (response.error & response.product_url) {
                        swal({
                            title: "Oh No!",
                            text: "Sorry, some error occurred. Please try again.",
                            icon: "error",
                        });
                    } else {
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                    }
                }
            });
        });
        jQuery(document).ready(function() {
        $( '.woocommerce-cart-form :input[name="update_cart"]' ).prop( 'disabled', false ).attr( 'aria-disabled', false );
    });
        jQuery(".matchHeight").matchHeight();
        jQuery("img").attr("data-no-retina", "");
        jQuery(".radiantthemes-retina img").removeAttr("data-no-retina");
        jQuery(".fancybox").fancybox({
            animationEffect: "zoom-in-out",
            animationDuration: 500,
            zoomOpacity: "auto",
        });
    });
    jQuery(window).on("load", function () {
        setTimeout(function () {
            jQuery(".preloader").addClass("loaded");
        }, jQuery(".preloader").data("preloader-timeout"));
        setTimeout(function () {
            jQuery(".page-transition-layer").removeClass("i-am-active");
        }, 700);
        setTimeout(function () {
            jQuery(".matchHeight").matchHeight();
        }, 2000);
        setTimeout(function () {
            jQuery(".isotope-blog-style").isotope({
                itemSelector: '.isotope-blog-style-item',
                layoutMode: 'masonry',
            });
        }, 100);
        if (jQuery(window).width() > 768) {
            jQuery(document).ready(StuckingFooter);
            jQuery(window).resize(StuckingFooter);
            function StuckingFooter() {
                jQuery(".footer-custom-stucking-container").css({
                    "height": jQuery(".footer-custom-stucking-mode").innerHeight(),
                });
            };
        }
        if (jQuery.fn.owlCarousel) {
            jQuery('.blog-carousel').owlCarousel({
                stagePadding: 250,
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                smartSpeed: 2500,
                lazyLoad: true,
                margin: 0,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 0
                    },
                    600: {
                        items: 2,
                        margin: 10,
                    },
                    1000: {
                        items: 2,
                    }
                }
            });
        }
        if (jQuery.fn.owlCarousel) {
            jQuery('.landing-portfolio-carousel').owlCarousel({
                center: true,
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                smartSpeed: 2500,
                lazyLoad: true,
                margin: 0,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 0
                    },
                    600: {
                        items: 2,
                        margin: 10,
                    },
                    1000: {
                        items: 2,
                    }
                }
            });
        }
        setTimeout(function () {
            jQuery(".radiantthemes-counterup").each(function () {
                jQuery(this).text(jQuery(this).data("counterup-value"));
            });
        }, 1);
    });
    
})(jQuery);
