<?php
/**
 * CareGiver post type.
 *
 * @package MadeByAura\MDSeniorLiving\PostTypes
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\PostTypes;

defined( 'ABSPATH' ) || die();

/**
 * CareGiver.
 */
class CareGiver {
	/**
	 * Instance.
	 *
	 * @since 1.0.0
	 *
	 * @var object Class object.
	 */
	private static $instance;

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 *
	 * @return object Initialized object of class.
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
		add_action( 'init', [ __CLASS__, 'register_post_type' ], 20 );
	}

	/**
	 * Register post type.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_post_type/
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function register_post_type() {
		register_post_type( 'aura_caregiver', [
			'labels'       => [
				'name'               => _x( 'Care Givers', 'post type general name', 'aura-mdseniorliving' ),
				'singular_name'      => _x( 'Care Giver', 'post type singular name', 'aura-mdseniorliving' ),
				'menu_name'          => _x( 'Care Givers', 'admin menu', 'aura-mdseniorliving' ),
				'name_admin_bar'     => _x( 'Care Giver', 'add new on admin bar', 'aura-mdseniorliving' ),
				'add_new'            => _x( 'Add New', 'care giver', 'aura-mdseniorliving' ),
				'add_new_item'       => __( 'Add New Care Giver', 'aura-mdseniorliving' ),
				'new_item'           => __( 'New Care Giver', 'aura-mdseniorliving' ),
				'edit_item'          => __( 'Edit Care Giver', 'aura-mdseniorliving' ),
				'view_item'          => __( 'View Care Giver', 'aura-mdseniorliving' ),
				'all_items'          => __( 'All Care Givers', 'aura-mdseniorliving' ),
				'search_items'       => __( 'Search Care Givers', 'aura-mdseniorliving' ),
				'parent_item_colon'  => __( 'Parent Care Givers:', 'aura-mdseniorliving' ),
				'not_found'          => __( 'No Care Givers found.', 'aura-mdseniorliving' ),
				'not_found_in_trash' => __( 'No Care Givers found in Trash.', 'aura-mdseniorliving' ),
			],
			'public'       => true,
			'show_in_rest' => true,
			'supports'     => [ 'title', 'thumbnail', 'revisions' ],
			'has_archive'  => false,
			'rewrite'      => [ 'slug' => 'care-givers' ],
		] );
	}
}
