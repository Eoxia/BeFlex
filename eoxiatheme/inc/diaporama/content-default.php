<?php $effect = get_field( 'effet_du_texte' ); ?>
<?php if( have_rows('diaporama') ): ?>
	<?php $diapo_class = 'diaporama-wrapper js-flickity eox-fx-'.$effect; ?>

	<?php $diapo_options = array(
		'cellAlign' => "left",
		'contain' => true, 
		//'wrapAround' => true,

		'imagesLoaded' => true
	); ?>
	
	<?php $diapo_options['autoPlay'] = get_field( 'autoplay' ) ? get_field( 'delai_auto_play' )*1000 : false; ?>

	<?php $diapo_options['pageDots'] = get_field( 'afficher_la_pagination' ) ? true : false; ?>

	<?php $diapo_options['prevNextButtons'] = get_field( 'afficher_la_navigation' ) ? true : false; ?>


	<div class="<?php echo $diapo_class; ?>" data-flickity-options=<?php echo json_encode( $diapo_options ); ?> >
		<?php  while ( have_rows('diaporama') ) : the_row(); ?>
				<div class="diaporama-item <?php echo get_field('nombre_ditems') ? 'size-'.round(100/get_field('nombre_ditems')) : false; ?>">
					<div class="diaporama-item-padder">
						<div class="diaporama-item-thumbnail">
							<?php $img = get_sub_field( 'image_de_fond' ); ?>
							<?php //var_dump( $img ); ?>
							<?php if( $img ): ?>
								<?php $att = wp_get_attachment_image($img['ID'], 'thumb-diaporama'); ?>
								<?php echo $img ? $att : false; ?>
								<!-- <img src="<?php echo $img['sizes']['thumb-diaporama']; ?>" alt="<?php echo $img['alt']; ?>"> -->
							<?php endif; ?>
						</div>
						<div class="diaporama-item-content">
							<div class="site-width">
								<?php eox_the_html( get_sub_field('titre_1'), 'h3', 'diaporama-title' ); ?>
								<?php eox_the_html( get_sub_field('laius'), 'p', 'diaporama-content' ); ?>
							</div>						
						</div>
						<?php eox_the_html_link( get_sub_field('label_du_bouton'), get_sub_field('lien_du_diaporama'), 'full-link'  ); ?>
					</div>
					
				</div>
		<?php endwhile; ?>
	</div>
	<!-- <span class="diaporama-timeline" style="background-color: <?php the_field( 'dominant_color', 'options' ); ?>"></span> -->
<?php else : ?>

	<?php $edit_link = '<a href="'.home_url().'/wp-admin/edit.php?post_type=diaporama">'.__('Ajouter', 'eoxiatheme').'</a>'; ?>
	<?php eox_get_alert( __('Pas de diaporama', 'eoxiatheme').' : '.$edit_link ); ?>

<?php endif; ?>