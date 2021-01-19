<?php
/**
 * The template for displaying Property Intro.
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

$logo        = get_field( 'aura_property_logo' );
$title       = get_field( 'aura_property_title' );
$location    = get_field( 'aura_property_location' );
$address     = get_field( 'aura_property_address' );
$map_link    = get_field( 'aura_property_map_link' );
$description = get_field( 'aura_property_description' );
?>

<div class="aura-property-intro">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="aura-property-intro__property-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<div class="aura-property-intro__container aura-container">
		<div class="aura-property-intro__inner">
			<div class="aura-property-intro__header">
				<?php if ( $logo ) : ?>
					<div class="aura-property-intro__property-logo"><?php echo wp_get_attachment_image( $logo, 'thumbnail' ); ?></div>
				<?php endif; ?>

				<?php if ( $title ) : ?>
					<h1 class="aura-property-intro__title"><?php echo esc_html( $title ); ?></h1>
				<?php endif; ?>

				<?php if ( $location ) : ?>
					<div class="aura-property-intro__location"><?php echo esc_html( $location ); ?></div>
				<?php endif; ?>
			</div><!-- .aura-property-intro__header -->

			<div class="aura-property-intro__footer">
				<?php if ( $description ) : ?>
					<p class="aura-property-intro__description"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>

				<div class="aura-property-intro__footer-right">
					<?php if ( $address ) : ?>
						<p class="aura-property-intro__address">
							<?php if ( $map_link ) : ?>
								<a class="aura-property-intro__address-link" href="<?php echo esc_url( $map_link ); ?>" target="_blank">
							<?php endif; ?>

							<?php
							echo wp_kses( $address, [
								'br' => [],
							] );
							?>

							<?php if ( $map_link ) : ?>
								<span class="aura-property-intro__get-directions-link" >Get direction <i class="fas fa-angle-right"></i></span>
							<?php endif; ?>

							<?php if ( $map_link ) : ?>
								</a>
							<?php endif; ?>
						</p><!-- .aura-property-intro__address -->
					<?php endif; ?>
				</div><!-- .aura-property-intro__footer-right -->
			</div><!-- .aura-property-intro__footer -->
		</div><!-- .aura-inner -->
	</div><!-- .aura-container -->
</div><!-- .aura-property-intro -->
