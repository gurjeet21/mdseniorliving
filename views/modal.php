<?php
/**
 * The template for displaying Modal.
 *
 * This template can be overridden by copying it to
 * your-child-theme/views/modal.php.
 *
 * HOWEVER, on occasion Aura will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @param array $view_data
 *
 * @package MadeByAura\BrandonPride
 * @author  MadeByAura.com
 * @since   1.0.0
 * @version 1.0.0
 */

namespace MadeByAura\BrandonPride;

defined( 'ABSPATH' ) || die();

use MadeByAura\WPTools\Render;

// Merge incoming `$view_data` with defaults.
$view_data = array_replace_recursive( [
	'id'     => '',
	'type'   => 'standard',
	'header' => true,
	'title'  => '',
], $view_data );

// Don't proceed if there is no ID.
if ( ! $view_data['id'] ) {
	return;
}

$classes[] = sprintf( 'aura-modal--%s', $view_data['id'] );
$classes[] = $view_data['type'] ? sprintf( 'aura-modal--type-%s', $view_data['type'] ) : '';
?>

<div class="aura-modal <?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-modal="<?php echo esc_attr( $view_data['id'] ); ?>">
	<div class="aura-modal__background" data-close-modal="<?php echo esc_attr( $view_data['id'] ); ?>"></div>

	<div class="aura-modal__container">
		<div class="aura-modal__inner">
			<?php if ( true === $view_data['header'] ) : ?>
				<div class="aura-modal__header">
					<?php if ( $view_data['title'] ) : ?>
						<h1 class="aura-modal__title"><?php echo esc_attr( $view_data['title'] ); ?></h1>
					<?php endif; ?>

					<div class="aura-modal__close" data-close-modal="<?php echo esc_attr( $view_data['id'] ); ?>"></div>
				</div><!-- .aura-modal__header -->
			<?php endif; ?>

			<div class="aura-modal__main">
				<?php Render::view( 'modal-content/' . $view_data['id'] ); ?>
			</div><!-- .aura-modal__main -->
		</div><!-- .aura-modal__inner -->
	</div><!-- .aura-modal__container -->
</div><!-- .aura-modal -->
