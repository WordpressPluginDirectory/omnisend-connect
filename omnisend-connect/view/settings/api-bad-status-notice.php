<?php
/**
 * Omnisend API Bad Status Notice View
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

function omnisend_display_api_bad_status_notice() {
	if ( ! Omnisend_Helper::are_permalinks_correct() ) {
		return;
	}

	if ( Omnisend_Settings::get_notices_status() === Omnisend_Settings::STATUS_DISABLED ) {
		return;
	}

	verify_woocommerce_api_status();
}

function verify_woocommerce_api_status() {
	$request_url = add_query_arg( 'shopURL', home_url(), OMNISEND_APP_URL . '/REST/woocommerce/plugin/notices' );

	$response = Omnisend_Helper::omnisend_api( $request_url, 'GET' );

	if ( $response['code'] != 200 ) {
		Omnisend_Logger::warning( 'api status request failed with code: ' . $response['code'] );
		return;
	}

	$resp = json_decode( $response['response'], true );

	if ( ! isset( $resp['notices'] ) ) {
		return;
	}

	foreach ( $resp['notices'] as $notice ) {
		display_woocommerce_api_bad_status_notice( $notice );
	}
}

function display_woocommerce_api_bad_status_notice( $notice ) {
	if ( $notice['type'] != 'basic_notice' ) {
		return;
	}

	?>
	<div>
		<div class="omnisend-notice omnisend-notice-<?php echo esc_html( $notice['variant'] ); ?> margin-top">
			<div class="omnisend-notice-content-container">
				<img src="<?php echo esc_url( plugin_dir_url( __NAMESPACE__ ) . 'omnisend-connect/assets/img/warning_24.svg' ); ?>">
				<div class="omnisend-notice-texts-container">
					<p class="omnisend-notice-title"><?php echo esc_html( $notice['title'] ); ?></p>
					<p class="omnisend-notice-desc"><?php echo esc_html( $notice['text'] ); ?></p>
				</div>
			</div>
			<?php
			display_notice_cta( $notice );
			?>
		</div>
	</div>
	<?php
}

function display_notice_cta( $notice ) {
	if ( isset( $notice['primaryCTA']['text'] ) ) {
		$brand_id = get_option( 'omnisend_account_id', null );
		$cta_url  = add_query_arg( 'brandID', $brand_id, $notice['primaryCTA']['link'] );

		?>
		<a class="omnisend-primary-button" href="<?php echo esc_url( $cta_url ); ?>" <?php echo $notice['primaryCTA']['openInNewTab'] ? 'target="_blank"' : ''; ?>>
			<?php echo esc_html( $notice['primaryCTA']['text'] ); ?>
		</a>
		<?php
	}
}
