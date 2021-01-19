<?php
/**
 * Managers.
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
 * Managers.
 */
class Managers {
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
		add_shortcode( 'aura-managers', [ __CLASS__, 'render' ] );
		add_shortcode( 'aura-managers-grid', [ __CLASS__, 'render_grid' ] );
	}

	/**
	 * Render shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function render() {
		$team = new CustomEntries( [
			'layout'        => 'managers-list',
			'query_args'    => [
				'post_type'      => 'aura_manager',
				'posts_per_page' => -1,
			],
			'nothing_found' => false,
			'pagination'    => false,
		] );

		ob_start();
			$team->render_entries();
		return ob_get_clean();
	}

	/**
	 * Render Grid shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function render_grid() {
		$team = new CustomEntries( [
			'layout'        => 'managers-grid',
			'query_args'    => [
				'post_type'      => 'aura_manager',
				'posts_per_page' => -1,
			],
			'nothing_found' => false,
			'pagination'    => false,
		] );

		ob_start();
			$team->render_entries();
		return ob_get_clean();
	}
}
