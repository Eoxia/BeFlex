<?php
/**
 * Template part of Flexible Gallery. Default Template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 2.3.0
 * @version 2.3.0
 * @package beflex
 */

$images         = get_sub_field( 'image_list' );
$gallery_class  = '';
$gallery_class .= get_sub_field( 'espacement_images' ) ? 'grid-gap-' . get_sub_field( 'espacement_images' ) : 'grid-gap-1';
$gallery_class .= get_sub_field( 'nb_images_par_ligne' ) ? ' gridwrapper w' . get_sub_field( 'nb_images_par_ligne' ) : ' gridwrapper w3';
$display_att    = get_sub_field( 'affichage_elt' );
$attr           = array(
	'captions' => ( ! empty( $display_att ) && in_array( 'displaytitle', $display_att, true ) ) ? true : false,
);
?>

<?php if ( ! empty( $images ) ) : ?>
<div class="gallery-container masonry <?php echo esc_html( $gallery_class ); ?>">
	<?php foreach ( $images as $image ) : ?>

		<div class="gallery">
			<a class="content" data-lightbox="<?php echo esc_attr( wp_json_encode( $attr ) ); ?>" href="<?php echo esc_url( $image['url'] ); ?>">
				<img src="<?php echo esc_url( $image['url'] ); ?>" title="<?php echo esc_html( $image['title'] ); ?>" alt="<?php echo esc_html( $image['title'] ); ?>" />

				<?php if ( ! empty( $display_att ) ) : ?>
					<div class="gallery-attr">
						<?php if ( in_array( 'displaytitle', $display_att, true ) ) : ?>
							<span class="gallery-title"><?php echo esc_html( $image['title'] ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</a>
		</div>

	<?php endforeach; ?>
</div>
<?php endif;
