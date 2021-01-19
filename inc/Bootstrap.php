<?php
/**
 * Bootstrap.
 *
 * @package MadeByAura\MDSeniorLiving
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving;

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
		// PostTypes.
		PostTypes\Team::get_instance();
		PostTypes\Property::get_instance();
		PostTypes\Manager::get_instance();
		PostTypes\Caregiver::get_instance();

		// Hooks.
		Hooks\Setup::get_instance();
		Hooks\Scripts::get_instance();
		Hooks\WidgetArea::get_instance();

		// Pages.
		Pages\All::get_instance();
		Pages\PropertySingle::get_instance();
		Pages\AlternateSidebar::get_instance();

		// Shortcodes.
		Shortcodes\Team::get_instance();
		Shortcodes\Properties::get_instance();
		Shortcodes\Managers::get_instance();
		Shortcodes\Caregivers::get_instance();

		// Plugin Installer.
		PluginInstaller\Bootstrap::get_instance();

		// Plugins.
		Plugins\Kirki\Bootstrap::get_instance();
	}
}
