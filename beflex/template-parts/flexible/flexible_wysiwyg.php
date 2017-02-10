<div class="section-content flexible-wysiwyg">
	<div class="site-layout site-width">

		<?php if( get_sub_field('afficher_une_sidebar') && get_sub_field('choisir_une_sidebar') ): ?>
			<div id="sidebar" class="widget-area eox-sidebar-droite" role="complementary">
				<?php eox_get_widget( get_sub_field('choisir_une_sidebar') ); ?>
			</div><!-- #sidebar -->
		<?php endif; ?>

		<div class="content">
			<?php echo get_sub_field('titre_de_la_section') ? eox_html(get_sub_field('titre_de_la_section'),'h2', 'section-title') : false ; ?>
			<?php the_sub_field('relation_wysiwyg'); ?>
		</div>

	</div>
</div>
