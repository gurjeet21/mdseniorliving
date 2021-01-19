<?php
/**
 * The template for displaying Caregiver Grid entry layout.
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

$description      = get_field( 'aura_caregiver_description' );
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'aura-entry aura-entry--layout-caregivers-grid' ); ?>>
	<a class="aura-entry__caregiver-link" href="<?php echo esc_url( $featured_img_url ); ?>" data-elementor-open-lightbox="yes" data-elementor-lightbox-title="<?php the_title(); ?>" data-elementor-lightbox-description="<?php echo esc_html( $description ); ?>" data-elementor-lightbox-slideshow="aura-caregiver-grid-enteries">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="aura-entry__caregiver-image"><?php the_post_thumbnail( 'medium_large' ); ?></div>
		<?php endif; ?>

		<div class="aura-entry__caregiver-content">
			<h2 class="aura-entry__caregiver-title"><?php the_title(); ?></h2>

			<?php if ( $description ) : ?>
				<p class="aura-entry__caregiver-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div><!-- .aura-entry__caregiver-content -->
	</a><!-- .aura-entry__caregiver-link -->
</div><!-- .aura-entry -->
