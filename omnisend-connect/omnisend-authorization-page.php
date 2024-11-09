<?php
/**
 * Omnisend Authorization Page
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

/**
 * Render authorization page
 */
function omnisend_show_authorization_page() {
	if ( ! Omnisend_Helper::is_woocommerce_plugin_activated() ) {
		Omnisend_Notifications::set_viewed( Omnisend_Notifications::WOOCOMMERCE_NOTIFICATION );
		display_woocommerce_not_installed_or_disabled();
		return;
	}

	if ( ! Omnisend_Helper::check_wp_wc_compatibility() ) {
		display_unsupported_wordpress_version();
		return;
	}

	wp_safe_redirect( Omnisend_Install::get_connecting_url(), 302 );
	exit();
}
