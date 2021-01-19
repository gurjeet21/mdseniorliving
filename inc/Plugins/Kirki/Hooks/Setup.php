<?php
/**
 * Setup.
 *
 * @link https://wordpress.org/plugins/kirki/
 *
 * @package MadeByAura\MDSeniorLiving\Plugins\Kirki\Hooks
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Plugins\Kirki\Hooks;

defined( 'ABSPATH' ) || die();

use MadeByAura\MDSeniorLiving\Base;

/**
 * Setup.
 */
class Setup {
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
		// Include customizer panels, sections, and fields.
		add_action( 'after_setup_theme', [ __CLASS__, 'include_fields' ], 1000 );
	}

	/**
	 * Include customizer panels, sections, and fields.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function include_fields() {
		$files = [
			'general/required-plugins.php',
		];

		foreach ( $files as $file ) {
			require_once Base::get_info( 'child_dir_path' ) . "inc/Plugins/Kirki/fields/{$file}";
		}
	}
}
