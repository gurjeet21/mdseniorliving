<?php
/**
 * Properties.
 *
 * @package MadeByAura\MDSeniorLiving\Shortcodes
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Shortcodes;

defined( 'ABSPATH' ) || die();

use MadeByAura\Prime\Modules\CustomEntries;

/**
 * Properties.
 */
class Properties {
	/**
	 * Instance.
	 *
	 * @since 1.0.0
	 *
	 * @var object  Class object.
	 */
	private static $instance;

	/**
	 * Instantiator.
	 *
	 * @since 1.0.0
	 *
	 * @return object  Class instance.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function __construct() {
		self::register_shortcodes();
	}

	/**
	 * Register shortcodes.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function register_shortcodes() {
		add_shortcode( 'aura-properties', [ __CLASS__, 'render' ] );
	}

	/**
	 * Render shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function render() {
		$properties = new CustomEntries( [
			'layout'        => 'property-grid',
			'query_args'    => [
				'post_type'      => 'aura_property',
				'posts_per_page' => 4,
			],
			'nothing_found' => false,
			'pagination'    => false,
		] );

		ob_start();
			$properties->render_entries();
		return ob_get_clean();
	}
}
