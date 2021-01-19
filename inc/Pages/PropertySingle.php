<?php
/**
 * Property Single.
 *
 * @package MadeByAura\MDSeniorLiving\Pages
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Pages;

defined( 'ABSPATH' ) || die();

use MadeByAura\WPTools\Render;
use MadeByAura\MDSeniorLiving\Base;

/**
 * PropertySingle.
 */
class PropertySingle {
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
		add_action( 'wp', [ __CLASS__, 'add_hooks' ], 20 );
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function add_hooks() {
		// Do not proceed if the current page is not Property Single.
		if ( ! is_singular( 'aura_property' ) ) {
			return;
		}

		add_action( 'aura/wp-tools/tag/middle/open/after', [ __CLASS__, 'render_intro' ], 20 );

		add_filter( 'aura/wp-tools/view/layouts/sidebar/path', [ __CLASS__, 'set_sidebar_view_path' ], 20 );

		add_filter( 'aura/prime/entries/layout', [ __CLASS__, 'set_entry_layout' ], 20 );
	}

	/**
	 * Render intro.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function render_intro() {
		Render::view( 'property/intro' );
	}

	/**
	 * Set sidebar view path.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function set_sidebar_view_path() {
		return trailingslashit( get_stylesheet_directory() ) . 'views/property/sidebar.php';
	}

	/**
	 * Set entry layout.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function set_entry_layout() {
		return 'property-single';
	}
}
