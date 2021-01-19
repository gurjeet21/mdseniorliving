<?php
/**
 * Stylesheets and JavaScript files.
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
 * Scripts.
 */
class Scripts {
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
		add_filter( 'aura/prime/styles', [ __CLASS__, 'add_styles' ], 20 );
		add_filter( 'aura/prime/scripts', [ __CLASS__, 'add_scripts' ], 20 );
	}

	/**
	 * Add stylesheets to be enqueued.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $styles Stylesheets to be enqueued.
	 * @return array
	 */
	public static function add_styles( $styles ) {
		$styles[] = [
			'handle'   => Base::get_info( 'child_slug' ),
			'uri'      => get_stylesheet_uri(),
			'version'  => Base::get_info( 'child_version' ),
			'priority' => 70,
		];

		$styles[] = [
			'handle'   => Base::get_info( 'child_slug' ) . '-app',
			'uri'      => Base::get_info( 'child_dir_url' ) . 'dist/css/app.css',
			'version'  => Base::get_info( 'child_version' ),
			'priority' => 60,
		];

		return $styles;
	}

	/**
	 * Add JavaScript files to be enqueued.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $scripts JavaScript files to be enqueued.
	 * @return array
	 */
	public static function add_scripts( $scripts ) {
		$scripts[] = [
			'handle'       => Base::get_info( 'child_slug' ) . '-app',
			'uri'          => Base::get_info( 'child_dir_url' ) . 'dist/js/app.js',
			'version'      => Base::get_info( 'child_version' ),
			'dependencies' => [ 'jquery', 'wp-util' ],
			'in_footer'    => true,
			'priority'     => 40,
		];

		return $scripts;
	}
}
