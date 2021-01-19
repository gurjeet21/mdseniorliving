<?php
/**
 * The template for displaying Property Sidebar.
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

$property_name     = get_field( 'aura_property_title' );
$property_location = get_field( 'aura_property_location' );
$manager_id        = get_field( 'aura_property_manager' );
$image_id          = get_post_thumbnail_id( $manager_id );
$name              = get_the_title( $manager_id );
$phone_number      = get_field( 'aura_manager_phone_number', $manager_id );
?>

<div class="aura-content__sidebar">
	<div class="aura-manager-info">
		<h2 class="aura-manager-info__title">Schedule a tour</h2>
		<p class="aura-manager-info__sub-title">Tours can be scheduled just about any day</p>
		<p class="aura-manager-info__description">Call and speak to our manager</p>

		<?php if ( $image_id ) : ?>
			<div class="aura-manager-info__image">
				<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
			</div><!-- .aura-manager-info__image -->
		<?php endif; ?>

		<div class="aura-manager-info__name"><?php echo esc_html( $name ); ?></div>

		<?php if ( $property_name && $property_location ) : ?>
			<div class="aura-manager-info__designation">Manager,</div>
			<div class="aura-manager-info__address"><?php echo esc_html( $property_name ); ?> <span class="aura-manager-info__location"><?php echo esc_html( $property_location ); ?></span></div>
		<?php endif; ?>

		<?php if ( $phone_number ) : ?>
			<a class="aura-manager-info__phone-number" href="tel:<?php echo esc_attr( $phone_number ); ?>"><?php echo esc_html( $phone_number ); ?></a>
		<?php endif; ?>
	</div><!-- .aura-manager-info -->
</div><!-- .aura-content__sidebar -->
