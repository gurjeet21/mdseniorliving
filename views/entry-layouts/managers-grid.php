<?php
/**
 * The template for displaying Manager Grid entry layout.
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

$properties   = get_field( 'aura_manager_properties' );
$description  = get_field( 'aura_manager_description' );
$phone_number = get_field( 'aura_manager_phone_number' );
?>

<div <?php post_class( 'aura-entry aura-entry--layout-managers-grid' ); ?> id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="aura-entry__manager-image"><?php the_post_thumbnail( 'medium_large' ); ?></div>
	<?php endif; ?>

	<div class="aura-entry__manager-text">
		<h2 class="aura-entry__manager-title"><?php the_title(); ?></h2>

		<div class="aura-entry__manager-designation">Manager,</div>

		<?php if ( $properties ) : ?>
			<div class="aura-entry__manager-properties">
				<?php foreach ( $properties as $property ) : ?>
					<?php
					$title    = get_field( 'aura_property_title', $property );
					$location = get_field( 'aura_property_location', $property );
					?>

					<div class="aura-entry__manager-property">
						<?php if ( $title ) : ?>
							<?php echo esc_html( $title ); ?>
						<?php endif; ?>

						<?php if ( $location ) : ?>
							<span class="aura-entry__manager-property-location"><?php echo esc_html( $location ); ?></span>
						<?php endif; ?>
					</div><!-- .aura-entry__manager-property -->
				<?php endforeach; ?>
			</div><!-- .aura-entry__manager-properties -->
		<?php endif; ?>

		<?php if ( $phone_number ) : ?>
			<a class="aura-manager-info__phone-number" href="tel:<?php echo esc_attr( $phone_number ); ?>"><?php echo esc_html( $phone_number ); ?></a>
		<?php endif; ?>
	</div><!-- .aura-entry__manager-text -->

</div><!-- .aura-entry -->
