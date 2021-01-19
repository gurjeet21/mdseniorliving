<?php
/**
 * Base.
 *
 * @package MadeByAura\MDSeniorLiving
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving;

defined( 'ABSPATH' ) || die();

use MadeByAura\Prime\Base as ParentBase;

/**
 * Base.
 */
class Base {
	/**
	 * Proxy function for `get_info()` method of `ParentBase` class.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $key  Variable key.
	 * @return string
	 */
	public static function get_info( $key ) {
		return ParentBase::get_info( $key );
	}

	/**
	 * Proxy function for `get_choices()` method of `ParentBase` class.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $key  Key.
	 * @return string
	 */
	public static function get_choices( $key ) {
		return ParentBase::get_choices( $key );
	}

	/**
	 * Proxy function for `get_acf()` method of `ParentBase` class.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $group    Group.
	 * @param  string $key      Key.
	 * @param  int    $post_id  Post ID.
	 * @param  mixed  $default  Fallback value.
	 * @return mixed
	 */
	public static function get_acf( $group, $key, $post_id = null, $default = null ) {
		return ParentBase::get_acf( $group, $key, $post_id, $default );
	}

	/**
	 * Proxy function for `get_mod()` method of `ParentBase` class.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $group  Group.
	 * @param  string $key    Key.
	 * @return mixed
	 */
	public static function get_mod( $group, $key ) {
		return ParentBase::get_mod( $group, $key );
	}

	/**
	 * Proxy function for `get_mod_default()` method of `ParentBase` class.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $group  Group.
	 * @param  string $key    Key.
	 * @return mixed
	 */
	public static function get_mod_default( $group, $key ) {
		return ParentBase::get_mod_default( $group, $key );
	}

	/**
	 * Proxy function for `set_mod_default()` method of `ParentBase` class.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $group  Group.
	 * @param  string $key    Key.
	 * @param  mixed  $value  Value.
	 * @return mixed
	 */
	public static function set_mod_default( $group, $key, $value ) {
		return ParentBase::set_mod_default( $group, $key, $value );
	}
}
