<?php
/**
 * The template for displaying Caregiver List entry layout.
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

$description = get_field( 'aura_caregiver_description' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'aura-entry aura-entry--layout-caregivers-list' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="aura-entry__caregiver-image"><?php the_post_thumbnail( 'medium_large' ); ?></div>
	<?php endif; ?>

	<div class="aura-entry__caregiver-text">
		<h2 class="aura-entry__caregiver-title"><?php the_title(); ?></h2>

		<?php if ( $description ) : ?>
			<p class="aura-entry__caregiver-description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div><!-- .aura-entry__caregiver-text -->

</div><!-- .aura-entry -->
