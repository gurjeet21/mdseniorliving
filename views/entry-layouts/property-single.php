<?php
/**
 * The template for displaying Property Single entry layout.
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
$address     = get_field( 'aura_property_address' );
$map_link    = get_field( 'aura_property_map_link' );
$content     = get_field( 'aura_property_content' );
$gallery     = get_field( 'aura_property_gallery' );
$map_address = get_field( 'aura_property_address_google_map' );
?>

<div <?php post_class( 'aura-entry aura-entry--layout-property-single' ); ?> id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>">
	<?php if ( $content ) : ?>
		<div class="aura-entry__property-description">
			<?php echo apply_filters( 'the_content', $content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div><!-- .aura-entry__property-description -->
	<?php endif; ?>

	<div class="aura-property-gallery">
		<div class="aura-property-gallery__items">
			<?php foreach ( $gallery as $index => $image_id ) : ?>
				<?php
				$url       = wp_get_attachment_image_src( $image_id, 'large' )[0];
				$image     = get_post( $image_id );
				$caption   = $image->post_excerpt;
				$image_url = wp_get_attachment_image_src( $image_id, Base::get_info( 'prefix' ) . 'thumbnail' )[0];
				$image_alt = $caption ? $caption : $image->post_title;
				?>
				<figure class="aura-property-gallery__item">
					<a class="aura-property-gallery__link" href="<?php echo esc_url( $url ); ?>" data-elementor-lightbox-slideshow="aura-property-single" data-elementor-lightbox-title="<?php echo esc_attr( $caption ); ?>">
						<?php if ( $index < 6 ) : ?>
							<img class="aura-property-gallery__image" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
						<?php endif; ?>
					</a><!-- .aura-property-gallery__link -->
				</figure><!-- .aura-property-gallery__item -->
			<?php endforeach; ?>
		</div><!-- .aura-property-gallery__items -->

		<div class="aura-property-gallery__button">
			<?php
			Render::view( 'button', [
				'text' => 'View Gallery',
			] );
			?>
		</div>
	</div><!-- .aura-property-gallery -->

	<?php if ( $map_address ) : ?>
		<div class="aura-entry__property-map">
			<iframe frameborder="0" width="100%" height="300" src="<?php echo esc_url( 'https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . $map_address . '&z=14&output=embed' ); ?>"></iframe>
		</div><!-- .aura-entry__property-map-link -->
	<?php endif; ?>
</div><!-- .aura-entry -->
