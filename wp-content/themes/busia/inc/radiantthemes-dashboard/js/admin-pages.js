'use strict';
(function ($) {
	$(document).ready(function () {
		// Auto update
		$('#rtgetpurchasecode').on('submit', function (e) {
			e.preventDefault();
			var $this = $(this);
			var $purchaseCodeInput = $('#rtPurchaseCode');
			var purchaseCodeVal = $purchaseCodeInput.val();
			// preloader
			$this.prepend('<div class="wna-spinner-wrap"><div class="wna-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>');
			$.ajax({
				type: 'POST',
				url: ajaxObject.ajaxUrl,
				data: {
					action: 'rtgetpurchasecode',
					security: ajaxObject.colornonce,
					purchaseCodeVal: purchaseCodeVal,
				},
				success: function (response) {					
					if (response == true) {
						$purchaseCodeInput.attr('readonly', true);
						$this.find('.btn.default').hide();
						$this.find('.btn.success').show();
						$this.find('.radiantthemes-notice.registration-failed').hide();
						$this.find('.radiantthemes-notice.registration-success').show();
					} else {
						$this.find('.radiantthemes-notice.registration-failed').show();
						$this.find('.radiantthemes-notice.registration-success').hide();
					}
					$this.find('.wna-spinner-wrap').remove();
					$this.attr('class', '');
					$this.addClass(response);
				}
			});
		});
		if (ajaxObject.validate_old_theme) {
			$('#rtgetpurchasecode').trigger('submit');
		}
	}); // end document ready
})(jQuery);
