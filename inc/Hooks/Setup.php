<?php
/**
 * Setup.
 *
 * @package MadeByAura\MDSeniorLiving\Hooks
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Hooks;

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
		// Add child theme information.
		add_filter( 'aura/prime/info/child_namespace', [ __CLASS__, 'add_theme_info_child_namespace' ], 20 );

		// Theme setup.
		add_action( 'after_setup_theme', [ __CLASS__, 'theme_setup' ], 20 );
	}

	/**
	 * Add child theme namespace to theme information.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function add_theme_info_child_namespace() {
		return 'MadeByAura\\MDSeniorLiving';
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress
	 * features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function theme_setup() {
		// Make theme available for translation. Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'aura-mdseniorliving', Base::get_info( 'child_dir_path' ) . 'languages' );
	}
}
