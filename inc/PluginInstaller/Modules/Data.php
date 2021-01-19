<?php
/**
 * Required plugins data.
 *
 * @package MadeByAura\MDSeniorLiving\PluginInstaller\Modules
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\PluginInstaller\Modules;

defined( 'ABSPATH' ) || die();

/**
 * Data.
 */
class Data {
	/**
	 * Get required plugins data.
	 *
	 * @since 1.0.0
	 *
	 * @return array $value
	 */
	public static function get_required() {
		static $plugins;

		if ( ! $plugins ) {
			$plugins['advanced_custom_fields_pro'] = [
				'name'         => esc_html__( 'Advanced Custom Fields Pro', 'aura-mdseniorliving' ),
				'slug'         => 'advanced-custom-fields-pro',
				'required'     => true,
				'source'       => 'http://files.madebyaura.com/plugins/advanced-custom-fields-pro.zip',
				'external_url' => 'https://www.advancedcustomfields.com/',
			];

			$plugins['contact_form_7'] = [
				'name'     => esc_html__( 'Contact Form 7', 'aura-mdseniorliving' ),
				'slug'     => 'contact-form-7',
				'required' => true,
			];

			$plugins['contact_form_cfdb7'] = [
				'name'     => esc_html__( 'Contact Form CFDB7', 'aura-mdseniorliving' ),
				'slug'     => 'contact-form-cfdb7',
				'required' => true,
			];

			$plugins['elementor'] = [
				'name'     => esc_html__( 'Elementor', 'aura-mdseniorliving' ),
				'slug'     => 'elementor',
				'required' => true,
			];

			$plugins['elementor_pro'] = [
				'name'         => esc_html__( 'Elementor Pro', 'aura-mdseniorliving' ),
				'slug'         => 'elementor-pro',
				'required'     => true,
				'source'       => 'http://files.madebyaura.com/plugins/elementor-pro.zip',
				'external_url' => 'https://www.elementor.com/',
			];
		}

		return $plugins;
	}

	/**
	 * Get required dev plugins data.
	 *
	 * @since 1.0.0
	 *
	 * @return array $value
	 */
	public static function get_required_dev() {
		static $plugins;

		if ( ! $plugins ) {
			$plugins['better_search_replace'] = [
				'name'     => esc_html__( 'Better Search Replace', 'aura-mdseniorliving' ),
				'slug'     => 'better-search-replace',
				'required' => false,
			];

			$plugins['duplicate_post'] = [
				'name'     => esc_html__( 'Duplicate Post', 'aura-mdseniorliving' ),
				'slug'     => 'duplicate-post',
				'required' => false,
			];

			$plugins['duplicator'] = [
				'name'     => esc_html__( 'Duplicator', 'aura-mdseniorliving' ),
				'slug'     => 'duplicator',
				'required' => false,
			];

			$plugins['regenerate-thumbnails'] = [
				'name'     => esc_html__( 'Regenerate Thumbnails', 'aura-mdseniorliving' ),
				'slug'     => 'regenerate-thumbnails',
				'required' => false,
			];
		}

		return $plugins;
	}
}
