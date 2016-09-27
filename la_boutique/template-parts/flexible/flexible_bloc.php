<?php $build_type_bloc = get_sub_field('type_de_bloc'); ?>

<?php $posts = get_sub_field('blocs'); ?>

<?php $nb_per_line = get_sub_field('nb_de_blocs_par_ligne'); ?>

<?php $mode = get_sub_field('mode_daffichage'); ?>

<?php $display_button = get_sub_field('afficher_le_bouton'); ?>

<?php $bgcolor = get_sub_field('couleur_de_fond');  ?>

<?php $txtcolor = get_sub_field('couleur_de_texte'); ?>

<?php $carousel = get_sub_field('bloc_carousel'); ?>

<?php $imgopacity = get_sub_field('opacite_de_limage'); ?>

<?php $align = get_sub_field('alignement'); ?>

<?php $displayelt = get_sub_field('affichage_elt'); ?>

<?php $displaymetas = get_sub_field('afficher_date_et_auteur_post'); ?>

<?php $displayimg = get_sub_field('afficher_limage'); ?>

<?php $displaytitle = get_sub_field('afficher_le_titre'); ?>

<?php $displayexcerpt = get_sub_field('afficher_lextrait'); ?>

<?php $excerptlength = get_sub_field('langueur_maxi_de_lextrait'); ?>

<?php $fullwidth = get_sub_field('pleine_largeur'); ?>

<?php $espace_bloc = get_sub_field('espacement_bloc'); ?>

<?php $espace_section = get_sub_field('espacement_section'); ?>

<?php $atts = array(
    'display' => 'grid',
    'itemperline' => $nb_per_line,
    'haswrapper' => 0,
    'mode' => $mode,
    'iscarousel' => $carousel,
    'bgcolor' => $bgcolor,
    'txtcolor' => $txtcolor,
    'displaybutton' => $displayelt,
    'imgopacity' => $imgopacity,
    'align' => $align,
    'displaymetas' => $displayelt,
    'displayimg' => $displayelt,
    'displaytitle' => $displayelt,
    'displayexcerpt' => $displayelt,
    'excerptlength' => $excerptlength,
    'ratio' => 'auto',
    'espacement_bloc' => $espace_bloc,
    'espacement_section' => $espace_section
); ?>
<?php

$carousel_base_options = array(
	'cellAlign' => "left",
	'contain' => true, 
	'imagesLoaded' => true
);

?>
<?php $section_style = ''; ?>
<?php $section_bg_color = ''; ?>
<?php $section_has_bg = get_sub_field('background'); ?>
<?php if( $section_has_bg ): ?>
	<?php $section_bg_color = get_sub_field('couleur_de_fond_de_la_section') ? 'background-color:'.get_sub_field('couleur_de_fond_de_la_section').';' : false; ?>
	<?php $section_txt_color = get_sub_field('couleur_du_texte_de_la_section') ? 'color:'.get_sub_field('couleur_du_texte_de_la_section').';' : false; ?>
	<?php $img = get_sub_field('image_de_fond_de_la_section'); ?>
	<?php $section_bg_img =  $img ? 'background-image:url('.$img['url'].');' : false; ?>
	<?php //print_r( $section_bg_img ); ?>
	<?php $section_style = 'style="'.$section_bg_color.' '.$section_txt_color.' '.$section_bg_img.'";' ?>
<?php endif; ?>



<div class="section-content <?php echo '-padding-'.$espace_section; ?> <?php echo '-a-'.$align; ?> <?php echo '-o-'.get_sub_field('opacite_de_limage_section'); ?>" <?php echo $section_style; ?>>
<span class="section-opacity" style="<?php echo $section_bg_color; ?>"></span>
<!-- <div class="<?php echo $fullwidth ? 'full-width' : 'site-width'; ?>" style="<?php echo get_sub_field('couleur_de_fond_de_la_section') ? 'background-color:'.get_sub_field('couleur_de_fond_de_la_section').';' : false; ?><?php echo get_sub_field('couleur_du_texte_de_la_section') ? 'color:'.get_sub_field('couleur_du_texte_de_la_section').';' : false; ?>"> -->
	<div class="site-layout <?php echo $fullwidth ? '' : 'site-width'; ?>">
		<?php if( get_sub_field('afficher_une_sidebar') && get_sub_field('choisir_une_sidebar') ): ?>
		<div id="sidebar" class="widget-area eox-sidebar-droite" role="complementary">
			<?php eox_get_widget( get_sub_field('choisir_une_sidebar') ); ?>
		</div><!-- #sidebar -->
			
		<?php endif; ?>
		<div class="content">
			<?php //print_r($atts); ?>
			<?php echo get_sub_field('titre_de_la_section') ? eox_html(get_sub_field('titre_de_la_section'),'h2', 'section-title') : false ; ?>
			<div class="gridwrapper -padding-<?php echo $atts['espacement_bloc']; ?> <?php echo $carousel ? 'js-flickity' : false; ?>" data-flickity-options=<?php echo json_encode( $carousel_base_options ); ?>>
				<?php if( $posts && $build_type_bloc == 'auto' ): ?>
					
				    <?php foreach( $posts as $post): ?>

				        <?php echo do_shortcode('[get_blocs id="'.$post->ID.'" '.eox_serialize_shortcode_atts( $atts ).']'); ?>
				       
				    <?php endforeach; ?>
				   
				    <?php wp_reset_postdata(); ?>
				    
				<?php else: ?>
					
					<?php if( have_rows('bloc_manuel') ): ?>

					    	<?php echo do_shortcode('[get_blocs '.eox_serialize_shortcode_atts( $atts ).']'); ?>

					<?php else : ?>

							<?php $edit_link = '<a href="'.home_url().'/wp-admin/edit.php?post_type=featured_bloc">'.__('Ajouter', 'eoxiatheme').'</a>'; ?>

							<?php eox_get_alert( __('Pas de bloc', 'eoxiatheme').' : '.$edit_link ); ?>

					<?php endif; ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
</div>