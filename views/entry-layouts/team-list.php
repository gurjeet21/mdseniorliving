<?php
/**
 * The template for displaying Team List entry layout.
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

$sub_title     = get_field( 'aura_team_sub_title' );
$qualification = get_field( 'aura_team_qualification' );
$designation   = get_field( 'aura_team_designation' );
$description   = get_field( 'aura_team_description' );
?>

<div <?php post_class( 'aura-entry aura-entry--layout-team-list' ); ?> id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="aura-entry__member-image"><?php the_post_thumbnail( 'medium_large' ); ?></div>
	<?php endif; ?>

	<div class="aura-entry__member-text">
		<h2 class="aura-entry__member-title"><?php the_title(); ?></h2>

		<?php if ( $sub_title ) : ?>
			<div class="aura-entry__member-sub-title"><?php echo esc_html( $sub_title ); ?></div>
		<?php endif; ?>

		<div class="aura-entry__member-meta">
			<?php if ( $qualification ) : ?>
				<div class="aura-entry__member-qualification">
					<?php
						echo wp_kses( $qualification, [
							'br' => [],
						] );
					?>
				</div><!-- .aura-entry__member-qualification -->
			<?php endif; ?>

			<?php if ( $designation ) : ?>
				<div class="aura-entry__member-designation">
					<?php
					echo wp_kses( $designation, [
						'br' => [],
					] );
					?>
				</div><!--.aura-entry__member-designation -->
			<?php endif; ?>
		</div><!-- aura-entry__member-list -->

		<?php if ( $description ) : ?>
			<p class="aura-entry__member-description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div><!-- .aura-entry__member-text -->

</div><!-- .aura-entry -->
