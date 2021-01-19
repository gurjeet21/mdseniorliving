<?php
/**
 * Setup.
 *
 * @package MadeByAura\MDSeniorLiving\PluginInstaller\Hooks
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\PluginInstaller\Hooks;

defined( 'ABSPATH' ) || die();

use MadeByAura\MDSeniorLiving\Base;
use MadeByAura\MDSeniorLiving\PluginInstaller\Modules\Data;

/**
 * Setup.
 */
class Setup {
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
		// Add plugins required by child theme.
		add_filter( 'aura/prime/tgmpa/plugins', [ __CLASS__, 'add_required_plugins' ], 20 );
	}

	/**
	 * Add plugins required by child theme.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $plugins  Required plugins data.
	 * @return array
	 */
	public static function add_required_plugins( $plugins ) {
		foreach ( Data::get_required() as $plugin_id => $plugin ) {
			if ( Base::get_mod( 'advanced', "include_plugin_{$plugin_id}" ) ) {
				$plugins[] = $plugin;
			}
		}

		if ( Base::get_mod( 'advanced', 'include_dev_plugins' ) ) {
			$plugins = array_merge_recursive( Data::get_required_dev(), $plugins );
		}

		return $plugins;
	}
}
