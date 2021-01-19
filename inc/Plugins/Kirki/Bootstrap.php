<?php
/**
 * Kirki integeration file.
 *
 * @link https://wordpress.org/plugins/kirki/
 *
 * @package MadeByAura\MDSeniorLiving\Plugins\Kirki
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Plugins\Kirki;

defined( 'ABSPATH' ) || die();

use MadeByAura\WPTools\Utils;

/**
 * Bootstrap.
 */
class Bootstrap {
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
		if ( Utils::is_plugin_active( 'kirki/kirki.php' ) ) {
			Hooks\Setup::get_instance();
		}
	}
}
