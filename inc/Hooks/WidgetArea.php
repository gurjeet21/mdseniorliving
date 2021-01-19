<?php
/**
 * WidgetArea.
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
 * WidgetArea.
 */
class WidgetArea {
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
		add_action( 'after_setup_theme', [ __CLASS__, 'register_widget_areas' ], 20 );
	}

	/**
	 * Register widget areas.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function register_widget_areas() {
		register_sidebar( [
			'name'          => esc_html__( 'Alternate Sidebar', 'aura-mdseniorliving' ),
			'id'            => Base::get_info( 'prefix' ) . 'alternate_sidebar',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		] );
	}
}
