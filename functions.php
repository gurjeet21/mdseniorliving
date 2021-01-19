<?php
/**
 * Basic theme functions and definitions.
 *
 * This theme uses PHP namespaces. It makes sure that we have no conflits with
 * WordPress core and plugins.
 *
 * @see http://php.net/manual/en/language.namespaces.php
 *
 * @package MadeByAura\MDSeniorLiving
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving;

defined( 'ABSPATH' ) || die();

/**
 * Auto-load any projects via the Composer autoloader. Be sure to check if the
 * file exists in case someone's using Composer to load their dependencies in
 * a different directory. This also autoloads our theme's classes.
 *
 * @since 1.0.0
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
} else {
	exit( wp_kses_post( sprintf(
		'Run %3$s%1$s%4$s at %3$s%2$s%4$s to generate autoload files and try again.',
		'composer install',
		__DIR__,
		'<code style="background-color: yellow;">',
		'</code>'
	) ) );
}

// Bootstrap.
Bootstrap::get_instance();
