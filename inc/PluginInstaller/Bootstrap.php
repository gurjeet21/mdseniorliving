<?php
/**
 * Bootstrap.
 *
 * @package MadeByAura\MDSeniorLiving\PluginInstaller
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\PluginInstaller;

defined( 'ABSPATH' ) || die();

/**
 * Bootstrap.
 */
class Bootstrap {
	/**
	 * Instance.
	 *
	 * @since 1.0.0
	 *
	 * @var object Class object.
	 */
	private static $instance;

	/**
	 * Instantiator.
	 *
	 * @since 1.0.0
	 *
	 * @return object Class instance.
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
		self::register_hooks();
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected static function register_hooks() {
		Hooks\Setup::get_instance();
	}
}
