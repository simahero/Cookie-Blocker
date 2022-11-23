function sleep(ms) {
	return new Promise((resolve) => setTimeout(resolve, ms))
}

async function waitForFunction(callback) {
	while (typeof jQuery(this).moove_gdpr_read_cookies !== 'function') {
		await sleep(1000)
	}
	callback()
}

jQuery(document).ready(function () {
	waitForFunction(function () {
		var cookies_object = jQuery(this).moove_gdpr_read_cookies()
		if (typeof cookies_object === 'object') {
			if (cookies_object.strict == 0) {
				jQuery('body').append('<div id="moove_gdpr_cookie_fader"></div>')
			}
		}

		jQuery(document).bind('click', '.moove-gdpr-modal-allow-all', function (e) {
			var cookies_object = jQuery(this).moove_gdpr_read_cookies()
			if (cookies_object.strict == 1) {
				jQuery('#moove_gdpr_cookie_fader').hide()
			}
		})

		jQuery(document).bind('click', '.moove-gdpr-modal-reject-all', function (e) {
			var cookies_object = jQuery(this).moove_gdpr_read_cookies()
			if (cookies_object.strict == 1) {
				jQuery('#moove_gdpr_cookie_fader').hide()
			}
		})

		jQuery(document).bind('click', '.moove-gdpr-modal-save-settings', function (e) {
			var cookies_object = jQuery(this).moove_gdpr_read_cookies()
			if (cookies_object.strict == 1) {
				jQuery('#moove_gdpr_cookie_fader').hide()
			}
		})
	})
})
