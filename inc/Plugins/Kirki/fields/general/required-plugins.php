<?php
/**
 * Add customizer panels and fields using Kirki.
 *
 * @link https://wordpress.org/plugins/kirki/
 *
 * @package MadeByAura\MDSeniorLiving\Plugins\Kirki
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Plugins\Kirki;

use MadeByAura\Prime\Plugins\Kirki\Modules\Customizer;
use MadeByAura\MDSeniorLiving\Base;
use MadeByAura\MDSeniorLiving\PluginInstaller\Modules\Data as PluginInstaller;

defined( 'ABSPATH' ) || die();

$group    = 'advanced';
$priority = 100;

$priority = Customizer::add_collapsible( $group, 'required_plugins', $priority, [
	'title' => esc_attr__( 'Required Plugins', 'aura-mdseniorliving' ),
] );

foreach ( PluginInstaller::get_required() as $plugin_id => $plugin ) {
	// General > Advanced > $plugin_id.
	$key      = "include_plugin_$plugin_id";
	$priority = Customizer::add_field( $group, $key, $priority, [
		'label'   => esc_attr( $plugin['name'] ),
		'type'    => 'checkbox',
		'default' => Base::set_mod_default( $group, $key, true ),
	] );
}

// General > Advanced > Development Plugins.
$key      = 'include_dev_plugins';
$priority = Customizer::add_field( $group, $key, $priority, [
	'label'   => esc_attr__( 'Development Plugins', 'aura-mdseniorliving' ),
	'type'    => 'checkbox',
	'default' => Base::set_mod_default( $group, $key, false ),
] );
