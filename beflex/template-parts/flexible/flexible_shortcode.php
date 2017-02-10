<div class="section-content flexible-shortcode">
	<div class="site-layout site-width">

		<?php if( get_sub_field('afficher_une_sidebar') && get_sub_field('choisir_une_sidebar') ): ?>
			<div id="sidebar" class="widget-area eox-sidebar-droite" role="complementary">
				<?php eox_get_widget( get_sub_field('choisir_une_sidebar') ); ?>
			</div><!-- #sidebar -->
		<?php endif; ?>

		<div class="content">
			<?php echo get_sub_field('titre_de_la_section') ? eox_html(get_sub_field('titre_de_la_section'),'h2', 'section-title') : false ; ?>
			<?php echo do_shortcode('['.get_sub_field('shortcode').']'); ?>
		</div>

	</div>
</div>
