<?php
/**
 * Plugin Name: Omnisend for WooCommerce
 * Plugin URI: https://www.omnisend.com
 * Description: 125,000+ ecommerce stores use Omnisend to sell more stuff to more people. Send newsletters & SMS and build email lists with popups.
 * Version: 1.15.33
 * Author: Omnisend
 * Author URI: https://www.omnisend.com
 * Developer: Omnisend
 * Developer URI: https://developers.omnisend.com
 *
 * WC requires at least: 6.0
 * WC tested up to: 9.5
 *
 * Copyright: © 2018 Omnisend
 * License: GPLv3 or later License
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'OMNISEND_WOO_PLUGIN_FILE' ) ) {
	define( 'OMNISEND_WOO_PLUGIN_FILE', __FILE__ );
}

define( 'OMNISEND_APP_DOMAIN', 'app.omnisend.com' );
define( 'OMNISEND_APP_URL', 'https://app.omnisend.com' );
define( 'OMNISEND_API_URL', 'https://api.omnisend.com' );
define( 'OMNISEND_SNIPPET_URL', 'https://omnisnippet1.com/platforms/embed.js' );
define( 'OMNISEND_DISCOUNTS_KB_ARTICLE_URL', 'https://support.omnisend.com/en/articles/5846981-discount-content-block-for-woocommerce' );
define( 'OMNISEND_CALLBACK_URL', OMNISEND_APP_URL . '/REST/woocommerce/keys' );
define( 'OMNISEND_LOGS_KEY', 'qhyXzQsK7hnynKH0C6qVyVqCJWvWt8atAHB' );
define( 'OMNISEND_LOGS_URL', OMNISEND_APP_URL . '/woocommerce/plugin/logs' );
define( 'OMNISEND_ACTIVATION_URL', OMNISEND_APP_URL . '/woocommerce/plugin/activation' );
define( 'OMNISEND_UPDATE_URL', OMNISEND_APP_URL . '/woocommerce/plugin/update' );
define( 'OMNISEND_SETTINGS_PAGE', 'omnisend-woocommerce' );
define( 'OMNISEND_AUTHORIZATION_PAGE', 'omnisend-authorize' );
define( 'OMNISEND_LOGS_PAGE', 'omnisend-logs' );
define( 'OMNISEND_SYNC_PAGE', 'omnisend-sync' );
define( 'OMNISEND_WC_API_APP_NAME', 'Omnisend App' );
define( 'OMNISEND_API_KEY_HEADER_NAME', 'X-API-KEY' );
define( 'OMNISEND_ORIGIN_HEADER_NAME', 'X-Omnisend-Origin' );
define( 'OMNISEND_ORIGIN_HEADER_VALUE', 'woocommerce' );
define( 'OMNISEND_LOGIN_URL', OMNISEND_APP_URL . '/login' );
define( 'OMNISEND_REGISTRATION_URL', OMNISEND_APP_URL . '/ecom/registration/start' );
define( 'OMNISEND_PLUGIN_INSTALL_URL', 'REST/woocommerce/install' );
define( 'OMNISEND_ONBOARDING_URL', OMNISEND_APP_URL . '/dashboard' );
define( 'OMNISEND_SWITCH_BRANDS_URL', OMNISEND_APP_URL . '/accounts/switch-store' );
define( 'OMNISEND_EVENTS_TRACKING_URL', OMNISEND_APP_URL . '/woocommerce/events/track' );
define( 'OMNISEND_LANDING_PAGE_CONTENT_URL', OMNISEND_APP_URL . '/REST/woocommerce/plugin/content' );

require_once 'manager/class-omnisend-logger.php';
require_once 'manager/class-omnisend-manager-assistant.php';
require_once 'manager/class-omnisend-helper.php';
require_once 'manager/class-omnisend-empty-required-fields-exception.php';
require_once 'manager/class-omnisend-manager.php';
require_once 'manager/class-omnisend-sync-manager.php';
require_once 'manager/class-omnisend-server-session.php';
require_once 'manager/class-omnisend-user-storage.php';
require_once 'manager/class-omnisend-contact-resolver.php';
require_once 'manager/class-omnisend-event-tracker.php';
require_once 'manager/class-omnisend-logs-sender.php';
require_once 'manager/class-omnisend-settings.php';
require_once 'manager/class-omnisend-notifications.php';
require_once 'manager/class-omnisend-content.php';
require_once 'manager/class-omnisend-contact-cache.php';
/*Include Model classes*/
require_once 'model/class-omnisend-product.php';
require_once 'model/class-omnisend-contact.php';
require_once 'model/class-omnisend-cart.php';
require_once 'model/class-omnisend-cart-event.php';
require_once 'model/class-omnisend-order.php';
require_once 'model/class-omnisend-category.php';
require_once 'model/class-omnisend-sync.php';
require_once 'model/class-omnisend-connection-error.php';
/*Include Ajax classes & functions*/
require_once 'class-omnisend-operation-status.php';
require_once 'class-omnisend-ajax.php';
/*Include settings page display function*/
require_once 'omnisend-settings-page.php';
/*Include authorization page display function*/
require_once 'omnisend-authorization-page.php';
/*Include logs page display function*/
require_once 'omnisend-logs.php';
/*Include WooCommerce hooks*/
require_once 'omnisend-woocommerce-hooks.php';
/*Include WooCommerce hooks*/
require_once 'omnisend-rebuild-cart.php';
/* Include repository classes */
require_once 'class-omnisend-sync-stats.php';
require_once 'class-omnisend-all-sync-stats.php';
require_once 'class-omnisend-sync-stats-repository.php';
/* Include views */
require_once 'view/settings/api-access-notice.php';
require_once 'view/settings/api-bad-status-notice.php';
require_once 'view/settings/navigation-tabs.php';
require_once 'view/settings/account-information.php';
require_once 'view/settings/connected.php';
require_once 'view/settings/connection.php';
require_once 'view/settings/permalink-notice.php';
require_once 'view/settings/connection-error-notice.php';
require_once 'view/settings/tag.php';
require_once 'view/settings/sync.php';
require_once 'view/settings/checkout-opt-in-checkbox.php';

require_once 'includes/omnisend-api.php';
require_once 'includes/omnisend-cart-event-filter.php';
require_once 'includes/class-omnisend-install.php';
require_once 'includes/class-omnisend-logs.php';
require_once 'includes/blocks/init.php';

/*Declare plugin's settings page*/
add_action( 'admin_menu', 'omnisend_woocommerce_menu' );

function omnisend_woocommerce_menu() {
	$omnisend_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTkyIiBoZWlnaHQ9IjE5MiIgdmlld0JveD0iMCAwIDE5MiAxOTIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxnIGNsaXAtcGF0aD0idXJsKCNjbGlwMF80MDI1XzE4NzQpIj4KPHBhdGggZD0iTTE3MC42IDY4LjU5OTlIMTY2LjhDMTY1LjUgNzcuMjk5OSAxNTggODMuOTk5OSAxNDguOSA4My45OTk5SDY5LjRDNjguOSA4NS44OTk5IDY4LjUgODcuODk5OSA2OC41IDg5Ljg5OTlWMTcwLjVDNjguNSAxODIuMyA3OC4xIDE5MS45IDg5LjkgMTkxLjlIOTguOUgxMjYuNlYxNzQuMkMxMjYuNiAxNTcuMiAxMjQuNSAxNDQuMSAxMTEuOCAxNDAuNFYxMjYuNUMxMzIuNCAxMjguMyAxNDIuNiAxNDMuNiAxNDIuNiAxNjguOFYxOTJIMTU5LjRIMTcwLjVDMTgyLjMgMTkyIDE5MS45IDE4Mi40IDE5MS45IDE3MC42Vjg5Ljg5OTlDMTkyIDc4LjA5OTkgMTgyLjQgNjguNTk5OSAxNzAuNiA2OC41OTk5Wk0xMzAuOSAxMTMuMUMxMjQuNCAxMTMuMSAxMTkuMSAxMDcuOCAxMTkuMSAxMDEuM0MxMTkuMSA5NC43OTk5IDEyNC40IDg5LjQ5OTkgMTMwLjkgODkuNDk5OUMxMzcuNCA4OS40OTk5IDE0Mi43IDk0Ljc5OTkgMTQyLjcgMTAxLjRDMTQyLjcgMTA3LjkgMTM3LjQgMTEzLjEgMTMwLjkgMTEzLjFaIiBmaWxsPSIjQTdBQUFEIi8+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTUuMjAzNiAtMC4yMTg1MDZIMTQ4LjY5M0MxNTcuMTI4IC0wLjIxODUwNiAxNjQgNi41NDk3IDE2NCAxNC45ODM5VjY1Ljc5NzVDMTY0IDc0LjIzMTggMTU3LjEyOCA4MC45OTk5IDE0OC42OTMgODAuOTk5OUgxMDAuNzk1SDc4LjUxMjRIMTUuMzA3N0M2Ljg3MzUgODAuOTk5OSAwLjAwMTE2Nzg1IDc0LjIzMTggMC4wMDExNjc4NSA2NS43OTc1VjE0Ljk4MzlDLTAuMTAyOTU4IDYuNjUzODIgNi43NjkzOCAtMC4yMTg1MDYgMTUuMjAzNiAtMC4yMTg1MDZaTTcwLjM0MjYgMjMuMDAxN0M2Ny4wOTYxIDIzLjAwOTggNjQuOTc3MyAyNC4wNTg2IDYzLjA4NDcgMjcuNTQ4Mkw1NC40MjExIDQzLjU3MjdWMjkuMzM3QzU0LjQyMTEgMjUuMDg4NiA1Mi4zNjkyIDIzLjAwMTcgNDguNTY5NCAyMy4wMDE3QzQ0Ljc2OTYgMjMuMDAxNyA0My4xNzM2IDI0LjI2ODcgNDEuMjczNyAyNy44NDYzTDMzLjA2NjEgNDMuNTcyN1YyOS40ODZDMzMuMDY2MSAyNC45Mzk1IDMxLjE2NjIgMjMuMDAxNyAyNi41MzA1IDIzLjAwMTdIMTcuMTA2OUMxMy41MzUxIDIzLjAwMTcgMTEuNTU5MiAyNC42NDE0IDExLjU1OTIgMjcuNjIyN0MxMS41NTkyIDMwLjYwNCAxMy40NTkxIDMyLjM5MjggMTYuOTU0OSAzMi4zOTI4SDIwLjgzMDdWNTAuMzU1MUMyMC44MzA3IDU1LjQyMzMgMjQuMzI2NiA1OC40MDQ2IDI5LjM0MjMgNTguNDA0NkMzNC4zNTgxIDU4LjQwNDYgMzYuNjM4IDU2LjQ2NjggMzkuMTQ1OCA1MS45MjAzTDQ0LjYxNzYgNDEuODU4NFY1MC4zNTUxQzQ0LjYxNzYgNTUuMzQ4OCA0Ny45NjE0IDU4LjQwNDYgNTMuMDUzMiA1OC40MDQ2QzU4LjE0NDkgNTguNDA0NiA2MC4wNDQ4IDU2LjY5MDQgNjIuOTMyNyA1MS45MjAzTDc1LjU0OCAzMS4wNTEyQzc4LjI3ODIgMjYuNTE0MyA3Ni4zOTIgMjMuMDE2NCA3MC4zNDI2IDIzLjAwMTdaTTcwLjM0MjYgMjMuMDAxN0w3MC4zMDQzIDIzLjAwMTdINzAuMzgwM0w3MC4zNDI2IDIzLjAwMTdaTTk0LjA5MTEgMjMuMDAxN0M4My43NTU3IDIzLjAwMTcgNzUuOTI4IDMwLjUyOTUgNzUuOTI4IDQwLjc0MDRDNzUuOTI4IDUwLjk1MTQgODMuODMxNiA1OC40MDQ2IDk0LjA5MTEgNTguNDA0NkMxMDQuMzUxIDU4LjQwNDYgMTEyLjE3OCA1MC44NzY4IDExMi4yNTQgNDAuNzQwNEMxMTIuMjU0IDMwLjUyOTUgMTA0LjM1MSAyMy4wMDE3IDk0LjA5MTEgMjMuMDAxN1pNOTQuMDkxMSA0Ny41MjI5QzkwLjIxNTMgNDcuNTIyOSA4Ny41NTU1IDQ0LjY5MDYgODcuNTU1NSA0MC43NDA0Qzg3LjU1NTUgMzYuNzkwMiA5MC4yMTUzIDMzLjg4MzQgOTQuMDkxMSAzMy44ODM0Qzk3Ljk2NyAzMy44ODM0IDEwMC42MjcgMzYuNzkwMiAxMDAuNjI3IDQwLjc0MDRDMTAwLjYyNyA0NC42OTA2IDk4LjA0MyA0Ny41MjI5IDk0LjA5MTEgNDcuNTIyOVpNMTE0Ljc2MiA0MC43NDA0QzExNC43NjIgMzAuNTI5NSAxMjIuNjY2IDIzLjAwMTcgMTMyLjkyNSAyMy4wMDE3QzE0My4xODUgMjMuMDAxNyAxNTEuMDg4IDMwLjYwNCAxNTEuMDg4IDQwLjc0MDRDMTUxLjA4OCA1MC44NzY4IDE0My4xODUgNTguNDA0NiAxMzIuOTI1IDU4LjQwNDZDMTIyLjY2NiA1OC40MDQ2IDExNC43NjIgNTAuOTUxNCAxMTQuNzYyIDQwLjc0MDRaTTEyNi40NjYgNDAuNzQwNEMxMjYuNDY2IDQ0LjY5MDYgMTI4Ljk3MyA0Ny41MjI5IDEzMi45MjUgNDcuNTIyOUMxMzYuODc3IDQ3LjUyMjkgMTM5LjQ2MSA0NC42OTA2IDEzOS40NjEgNDAuNzQwNEMxMzkuNDYxIDM2Ljc5MDIgMTM2LjgwMSAzMy44ODM0IDEzMi45MjUgMzMuODgzNEMxMjkuMDQ5IDMzLjg4MzQgMTI2LjQ2NiAzNi43OTAyIDEyNi40NjYgNDAuNzQwNFoiIGZpbGw9IiNBN0FBQUQiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF80MDI1XzE4NzQiPgo8cmVjdCB3aWR0aD0iMTkyIiBoZWlnaHQ9IjE5MiIgZmlsbD0id2hpdGUiLz4KPC9jbGlwUGF0aD4KPC9kZWZzPgo8L3N2Zz4K';

	$page_title = 'Omnisend for WooCommerce';
	$menu_title = get_menu_title( 'Omnisend for WooCommerce' );
	$capability = 'manage_options';
	$menu_slug  = OMNISEND_SETTINGS_PAGE;
	$function   = 'omnisend_show_settings_page';

	// Nonce verification is not required here.
 	// phpcs:disable WordPress.Security.NonceVerification
	if ( isset( $_GET['tab'] ) && $_GET['tab'] === OMNISEND_LOGS_PAGE ) {
		$function = 'omnisend_show_logs';
	}
	// phpcs:enable

	// Nonce verification is not required here.
 	// phpcs:disable WordPress.Security.NonceVerification
	if ( isset( $_GET['tab'] ) && $_GET['tab'] === OMNISEND_SYNC_PAGE ) {
		$function = 'omnisend_show_sync';
	}
	// phpcs:enable

	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $omnisend_icon, 2 );
	add_submenu_page( null, 'Omnisend Authorization', 'Omnisend Authorization', 'manage_options', OMNISEND_AUTHORIZATION_PAGE, 'omnisend_show_authorization_page' );
}

/**
 * Constructs plugin menu title.
 *
 * @return string
 */
function get_menu_title( $title ) {
	$omnisend_notification_count = Omnisend_Notifications::get_count();

	return $omnisend_notification_count ? sprintf( $title . ' <span class="awaiting-mod">%d</span>', $omnisend_notification_count ) : $title;
}

/*Include scripts and styles for settings page and get started notice*/
add_action( 'admin_enqueue_scripts', 'omnisend_admin_scripts_and_styles' );
function omnisend_admin_scripts_and_styles() {
	// Nonce verification is not required here.
	// phpcs:disable WordPress.Security.NonceVerification
	if ( isset( $_GET['page'] ) && $_GET['page'] === OMNISEND_SETTINGS_PAGE ) {
		omnisend_register_localize_enqueue_script(
			'omnisend-settings-script',
			'assets/js/omnisend-settings-script.js',
			'omnisend_settings_script_var',
			'omnisend-settings-script-nonce'
		);
		wp_enqueue_style(
			'omnisend-admin-style.css',
			plugin_dir_url( __FILE__ ) . 'assets/css/omnisend-admin-style.css?' . time(),
			array(),
			'1.0.0'
		);
		wp_enqueue_style(
			'roboto.css',
			plugin_dir_url( __FILE__ ) . 'assets/fonts/roboto/roboto.css?' . time(),
			array(),
			'1.0.0'
		);
	}
	// phpcs:enable
}

function omnisend_register_localize_enqueue_script( $handle, $file, $object_name, $nonce_action ) {
	$src = plugin_dir_url( __FILE__ ) . $file . '?' . time();
	wp_register_script( $handle, $src, array(), '1.0.0', true );
	wp_localize_script(
		$handle,
		$object_name,
		array(
			'nonce' => wp_create_nonce( $nonce_action ),
		)
	);
	wp_enqueue_script(
		$handle,
		$src,
		array(),
		'1.0.0',
		true
	);
}

/*Include front scripts */
add_action( 'wp_enqueue_scripts', 'omnisend_front_scripts_and_styles' );
function omnisend_front_scripts_and_styles() {
	$handle = 'omnisend-front-script.js';
	$file   = plugin_dir_url( __FILE__ ) . 'assets/js/omnisend-front-script.js?' . time();

	wp_register_script( $handle, $file, array(), '1.0.0', true );
	wp_localize_script(
		$handle,
		'omnisend_woo_data',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'omnisend-front-script-nonce' ),
		)
	);
	wp_enqueue_script( $handle, $file, array(), '1.0.0', true );
}

/*After plugin activation - go to settings page*/
add_action( 'activated_plugin', 'omnisend_activation' );
function omnisend_activation( $plugin ) {
	Omnisend_Logger::hook();
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		omnisend_activated();
	}
}

/**
 * Define Omnisend cron schedules.
 *
 * @param array $schedules List of WP scheduled cron jobs.
 *
 * @return array
 */
function omnisend_cron_schedules( $schedules ) {
	$schedules['omnisend_every_two_minutes'] = array(
		'interval' => 60 * 2,
		'display'  => __( 'Every 2 minutes', 'omnisend-woocommerce' ),
	);

	$schedules['omnisend_every_five_minutes'] = array(
		'interval' => 60 * 5,
		'display'  => __( 'Every 5 minutes', 'omnisend-woocommerce' ),
	);

	return $schedules;
}

/**
 * Init Omnisend crons.
 *
 * @return void
 */
function omnisend_init_crons() {
	// phpcs:ignore WordPress.WP.CronInterval.CronSchedulesInterval
	add_filter( 'cron_schedules', 'omnisend_cron_schedules' );

	Omnisend_Logs::init();
}

add_action( 'init', 'omnisend_init_crons' );

function omnisend_activated() {
	Omnisend_Logger::enable_logging();

	$first_activation = ! get_option( 'omnisend_account_id', null );

	if ( $first_activation ) {
		$default_checkout_opt_in_text = 'Email me with news and offers';

		Omnisend_Settings::add_checkout_opt_in_status( Omnisend_Settings::STATUS_ENABLED, 'default' );
		Omnisend_Settings::add_checkout_opt_in_text( $default_checkout_opt_in_text, 'default' );
		Omnisend_Settings::set_debug_logs_status( Omnisend_Settings::STATUS_DISABLED, 'default' );
		Omnisend_Settings::set_notices_status( Omnisend_Settings::STATUS_ENABLED, 'default' );
	}
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'omnisend_add_plugin_settings_link' );
function omnisend_add_plugin_settings_link( $links ) {
	$link = '<a href="' . admin_url( 'admin.php?page=' . OMNISEND_SETTINGS_PAGE ) . '">' . __( 'Settings' ) . '</a>';
	array_unshift( $links, $link );

	return $links;
}

add_action( 'admin_notices', 'omnisend_show_connection_notice' );
function omnisend_show_connection_notice() {
	if ( Omnisend_Helper::is_omnisend_connected() ) {
		return;
	}
	?>
	<div class="notice notice-warning is-dismissible">
		<p><strong>Connect your WooCommerce store to Omnisend</strong></p>
		<p>Collect, convert, and keep new customers with automated email & SMS. Connect your store and grow your audience with forms, recover sales with Abandoned cards, and Checkout automation.</p>
		<p>
			<a class="button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=' . OMNISEND_SETTINGS_PAGE ) ); ?>">
			Connect your store to Omnisend
			</a>
		</p>
	</div>
	<?php
}

add_action( 'admin_notices', 'omnisend_show_api_access_notice' );
function omnisend_show_api_access_notice() {
	if ( Omnisend_Manager::is_setup() && ! Omnisend_Helper::is_woocommerce_api_access_granted() ) {
		$omnisend_account_id = get_option( 'omnisend_account_id', null );
		$full_url            = Omnisend_Helper::get_wc_auth_url( $omnisend_account_id );

		?>
		<div class="notice notice-error is-dismissible">
			<p>
				Add missing permissions to keep Omnisend working with WooCommerce.
				<a id="wp-admin-auth-notice-link" href="<?php echo esc_url( $full_url ); ?>">Add permissions
				</a>
			</p>
		</div>
		<?php
	}
}

add_action( 'before_woocommerce_init', 'omnisend_declare_wc_hpos_compatibility' );
function omnisend_declare_wc_hpos_compatibility() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
}

register_activation_hook( __FILE__, 'omnisend_activate' );
function omnisend_activate() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	Omnisend_Install::notify_about_plugin_activation();
}

register_deactivation_hook( __FILE__, 'omnisend_deactivate' );
function omnisend_deactivate() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	Omnisend_install::deactivate();
}

register_uninstall_hook( __FILE__, 'omnisend_uninstall' );
function omnisend_uninstall() {
	Omnisend_Install::uninstall();
}

add_filter( 'allowed_redirect_hosts', 'omnisend_add_allowed_redirect_hosts' );
function omnisend_add_allowed_redirect_hosts( $domains ) {
	if ( is_array( $domains ) ) {
		array_push( $domains, OMNISEND_APP_DOMAIN );
	}

	return $domains;
}
