<?php
/**
 * AlternateSidebar.
 *
 * @package MadeByAura\MDSeniorLiving\Pages
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Pages;

defined( 'ABSPATH' ) || die();

use MadeByAura\MDSeniorLiving\Base;

/**
 * AlternateSidebar.
 */
class AlternateSidebar {
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
		$page_ids = Base::get_acf( 'option', 'pages_with_alternate_sidebar' );

		if ( ! $page_ids || ! is_page( Base::get_acf( 'option', 'pages_with_alternate_sidebar' ) ) ) {
			return;
		}

		add_filter( 'aura/prime/sidebar/widget_area', [ __CLASS__, 'set_sidebar_widget_area' ], 20 );
	}

	/**
	 * Set entry layout.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function set_sidebar_widget_area() {
		return Base::get_info( 'prefix' ) . 'alternate_sidebar';
	}
}
