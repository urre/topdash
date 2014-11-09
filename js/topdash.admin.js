(function ($) {
	"use strict";
	$(function () {

		$($("[id^=wp-admin-bar-topdash]").get().reverse()).each(function() {
			var _this = $(this);
			_this.appendTo("#wp-admin-bar-top-secondary");
		});

	});
}(jQuery));