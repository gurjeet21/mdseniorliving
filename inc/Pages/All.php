<?php
/**
 * All.
 *
 * @package MadeByAura\MDSeniorLiving\Pages
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving\Pages;

defined( 'ABSPATH' ) || die();

use MadeByAura\WPTools\Render;

/**
 * All.
 */
class All {
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
		add_action( 'wp_footer', [ __CLASS__, 'add_manager_info_modal' ], 20 );
		add_action( 'wp_footer', [ __CLASS__, 'add_manager_info_tmpl' ], 20 );
	}

	/**
	 * Add overview modal.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function add_manager_info_modal() {
		Render::view( 'modal', [
			'id'    => 'manager-info',
			'title' => 'Schedule a tour',
		] );
	}

	/**
	 * Add manager content modal.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function add_manager_info_tmpl() {
		?>
		<script type="text/template" id="tmpl-aura-modal-content-manager-info">
			<div class="aura-manager-info">
				<p class="aura-manager-info__sub-title">Tours can be scheduled just about any day</p>
				<p class="aura-manager-info__description">Call and speak to our manager</p>

				<# if (data.image_url) { #>
					<div class="aura-manager-info__image">
						<img src="{{data.image_url}}" alt="{{data.name}}">
					</div><!-- .aura-manager-info__image -->
				<# } #>

				<# if (data.name) { #>
					<div class="aura-manager-info__name">{{data.name}}</div>
				<# } #>

				<# if (data.property_title && data.property_location) { #>
					<div class="aura-manager-info__designation">Manager,</div>
					<div class="aura-manager-info__address">{{data.property_title}} <span class="aura-manager-info__location">{{data.property_location}}</span></div>
				<# } #>

				<# if(data.phone_number) { #>
					<a class="aura-manager-info__phone-number" href="tel:{{data.phone_number}}">{{data.phone_number}}</a>
				<# } #>
			</div><!-- .aura-manager-info -->
		</script>
		<?php
	}
}
