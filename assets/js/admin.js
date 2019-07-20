/* global ajaxurl, ainoNUX */

(function (wp, $) {

	'use strict';

	if (!wp) {
		return;
	}

	$(function () {

		// Dismiss notice
		$(document).on('click', '.sf-notice-nux .notice-dismiss', function () {
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: { nonce: ainoNUX.nonce, action: 'aino_dismiss_notice' },
				dataType: 'json'
			});
		});
	});
})(window.wp, jQuery);
