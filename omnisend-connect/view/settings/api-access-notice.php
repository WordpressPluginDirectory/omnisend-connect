<?php
/**
 * Omnisend API Access Notice View
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

function omnisend_display_api_access_granted_notice() {
	if ( isset( $_GET['_wpnonce'] ) ) {
		check_admin_referer( 'omnisend-oauth', '_wpnonce' );
	} else {
		return;
	}

	if ( ! isset( $_GET['success'] ) || $_GET['success'] == 0 ) {
		return;
	}

	?>
	<div class="notice updated is-dismissible api-key-success-notice omnisend-notice">
		<p>You’re all set. Permissions added successfully.</p>
	</div>
	<?php
}
