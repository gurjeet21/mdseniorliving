<?php
/**
 * The template for displaying Property Grid entry layout.
 *
 * @param array $view_data
 *
 * @package MadeByAura\MDSeniorLiving
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\MDSeniorLiving;

defined( 'ABSPATH' ) || die();

use MadeByAura\WPTools\Render;

$title       = get_field( 'aura_property_title' );
$location    = get_field( 'aura_property_location' );
$description = get_field( 'aura_property_description' );
$manager_id  = get_field( 'aura_property_manager' );
?>

<div <?php post_class( 'aura-entry aura-entry--layout-property-grid' ); ?> id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>">

	<?php if ( $title ) : ?>
		<h3 class="aura-entry__property-title">
			<a href="<?php the_permalink(); ?>">
				<?php echo esc_html( $title ); ?>
			</a>
		</h3><!-- .aura-entry__property-title -->
	<?php endif; ?>

	<?php if ( $location ) : ?>
		<p class="aura-entry__property-location"><?php echo esc_html( $location ); ?></p>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="aura-entry__property-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( Base::get_info( 'prefix' ) . 'thumbnail' ); ?>
			</a>
		</div><!-- .aura-entry__property-image -->
	<?php endif; ?>

	<?php if ( $description ) : ?>
		<p class="aura-entry__property-description"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>

	<div class="aura-entry__property-links">
		<a class="aura-entry__property-link aura-entry__property-link--read-more" href="<?php the_permalink(); ?>">Learn More <i class="fas fa-angle-right"></i></a>

		<?php if ( $manager_id ) : ?>
			<?php
			$manager_image_id  = get_post_thumbnail_id( $manager_id );
			$manager_image_url = '';

			if ( $manager_image_id ) {
				$manager_image_url = wp_get_attachment_image_src( $manager_image_id, 'thumbnail' )[0];
			}

			$manager_data = [
				'image_url'         => $manager_image_url,
				'name'              => get_the_title( $manager_id ),
				'phone_number'      => get_field( 'aura_manager_phone_number', $manager_id ),
				'property_title'    => $title,
				'property_location' => $location,
			];
			?>
			<a class="aura-entry__property-link aura-entry__property-link--schedule" href="#" data-open-modal="manager-info" data-modal-template="aura-modal-content-manager-info" data-modal-template-data="<?php echo esc_attr( wp_json_encode( $manager_data ) ); ?>">Schedule a tour <i class="fas fa-angle-right"></i></a>
		<?php endif; ?>
	</div><!-- .aura-entry__property-links -->

</div><!-- .aura-entry -->
