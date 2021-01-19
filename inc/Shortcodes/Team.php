<?php
/**
 * Team.
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
 * Team.
 */
class Team {
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
		add_shortcode( 'aura-team', [ __CLASS__, 'render' ] );
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
			'layout'        => 'team-list',
			'query_args'    => [
				'post_type'      => 'aura_team',
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
