<?php
/**
 * Omnisend Cart Event Class
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

class Omnisend_Cart_Event {

	const ADDED_PRODUCT_TO_CART = 'added product to cart';
	const STARTED_CHECKOUT      = 'started checkout';

	public static function added_product_to_cart( $event_time, $cart_item_key, $product_id, $variation_id, $variation, $quantity ) {
		if ( is_omnisend_cart_rebuild_url() ) {
			return;
		}

		if ( ! self::is_cart_valid() ) {
			return;
		}

		$added_item = null;

		if ( (bool) $product_id ) {
			$added_item = array(
				'product_id'   => $product_id,
				'variation_id' => $variation_id,
				'quantity'     => $quantity,
				'attributes'   => $variation,
			);

			$cart_item = WC()->cart->get_cart()[ $cart_item_key ];

			if ( ! is_null( $cart_item ) ) {
				$added_item['link'] = $cart_item['data']->get_permalink( $cart_item );
			}
		}

		Omnisend_Event_Tracker::track_event( self::ADDED_PRODUCT_TO_CART, $event_time, '', self::build_event_props( $added_item ) );
	}

	public static function started_checkout( $email = '', $event_time = '' ) {
		if ( self::is_cart_valid() ) {
			Omnisend_Event_Tracker::track_event( self::STARTED_CHECKOUT, $event_time, $email, self::build_event_props( null ) );
		}
	}

	private static function is_cart_valid() {
		return ! WC()->cart->is_empty();
	}

	private static function build_event_props( $added_item ) {
		$items = array();

		$cart = WC()->cart;

		foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
			$data      = $cart_item['data'];
			$line_item = array(
				'product_id'   => $cart_item['product_id'],
				'variation_id' => $cart_item['variation_id'],
				'quantity'     => $cart_item['quantity'],
				'link'         => $data->get_permalink( $cart_item ),
				'attributes'   => $cart_item['variation'],
			);
			array_push( $items, $line_item );
		}

		$cart->calculate_totals();

		$event_props = array(
			'raw'              => array(
				'currency'        => get_woocommerce_currency(),
				'currency_symbol' => get_woocommerce_currency_symbol(),
				'items'           => $items,
				'applied_coupons' => $cart->get_applied_coupons(),
				'totals'          => $cart->get_totals(),
			),
			'omnisend_cart_id' => Omnisend_Cart::get_or_set_cart_id(),
			'item_count'       => $cart->get_cart_contents_count(),
			'checkout_url'     => self::build_checkout_url( $cart ),
		);

		if ( $added_item ) {
			$event_props['added_item'] = $added_item;
		}

		return $event_props;
	}

	private static function build_checkout_url( $cart ) {
		$products = array();

		foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
			$product = array(
				'product_id'   => $cart_item['product_id'],
				'quantity'     => $cart_item['quantity'],
				'variation_id' => $cart_item['variation_id'],
				'variation'    => $cart_item['variation'],
			);

			array_push( $products, $product );
		}

		$cart_to_recover = array( 'products' => $products );
		// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
		$base64_encoded = base64_encode( wp_json_encode( $cart_to_recover ) );

		return home_url( '?action=rebuildCart&omniCart=' . $base64_encoded );
	}
}
