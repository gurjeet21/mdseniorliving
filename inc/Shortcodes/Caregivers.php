<?php
/**
 * Caregivers.
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
 * Caregivers.
 */
class Caregivers {
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
		add_shortcode( 'aura-caregivers', [ __CLASS__, 'render_list' ] );
		add_shortcode( 'aura-caregivers-grid', [ __CLASS__, 'render_grid' ] );
	}

	/**
	 * Render shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function render_list() {
		$team = new CustomEntries( [
			'layout'        => 'caregivers-list',
			'query_args'    => [
				'post_type'      => 'aura_caregiver',
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
	 * Render caregivers grid shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function render_grid() {
		$team = new CustomEntries( [
			'layout'        => 'caregivers-grid',
			'query_args'    => [
				'post_type'      => 'aura_caregiver',
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
