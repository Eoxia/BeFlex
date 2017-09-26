<?php
/**
 * ACF Flexible Bloc template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

if ( ! class_exists( 'beflex_bloc' ) ) :
	return;
endif;

$flexible_atts = Beflex_Bloc_Helper::g()->beflex_get_template_atts( get_the_ID() );
$bloc = new Beflex_Bloc( $flexible_atts );

$carousel_base_options = array(
	'responsive' => array(
		0 => array( 'items' => 1 ),
		600 => array( 'items' => ( 3 < $bloc->item_per_line ? 3 : 1 ) ),
		1000 => array( 'items' => $bloc->item_per_line ),
	),
);
$section_class = $bloc->get_section_class();
$section_style = $bloc->get_section_style();
$section_background_color = ( $bloc->section_background_color ) ? 'background: ' . $bloc->section_background_color : '';
$bloc_class = $bloc->get_bloc_class(); ?>

<div class="flexible-bloc section-content <?php echo esc_html( $section_class ); ?>" style="<?php echo esc_html( $section_style ); ?>">
	<span class="section-opacity" style="<?php echo esc_html( $section_background_color ); ?>"></span>
	<div class="site-layout <?php echo ( $bloc->full_size ) ? '' : 'site-width'; ?>">

		<?php if ( $bloc->sidebar && $bloc->sidebar_name ) : ?>
			<aside id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( $bloc->sidebar_name ); ?>
			</aside><!-- #secondary -->
		<?php endif; ?>

		<div class="content">
			<?php if ( ! empty( $bloc->section_title ) ) : ?>
				<header class="entry-header">
					<h2 class="section-title"><?php echo esc_html( $bloc->section_title ); ?></h2>
				</header><!-- .entry-header -->
			<?php endif; ?>

			<?php if ( ! empty( $bloc->data ) ) : ?>
				<div class="bloc-container gridwrapper <?php echo esc_html( $bloc_class ); ?> <?php echo ( $bloc->carousel ) ? 'owl-carousel bloc-diaporama' : ''; ?>" data-carousel=<?php echo wp_json_encode( $carousel_base_options ); ?>>
					<?php
					$bloc->render( $bloc->type_data );
					?>
				</div> <?php
			else :
				$user = wp_get_current_user();
				$id = ( ! empty( $bloc->id ) ) ? $bloc->id : $post->ID;
				$edit_url = home_url() . '/wp-admin/post.php?post=' . $id . '&action=edit';
				if ( beflex_allowed( $user->roles, 'editor,administrator' ) ) :
					echo beflex_notification( __( 'Le bloc est vide. Cliquez ici pour le configurer', 'beflex' ), 'warning', $edit_url ); // WPCS: XSS ok.
				endif;
			endif; ?>
		</div>

	</div>
</div>