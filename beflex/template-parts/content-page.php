<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package la_boutique
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( get_field('page_title') ): ?>
	
		<header class="entry-header">
			<div class="site-width"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
		</header><!-- .entry-header -->
	
	<?php endif; ?>

	<div class="entry-content">

		<div class="site-width">
			<?php the_content(); ?>
		</div>

		<?php $rows = 0; ?>				

		<?php if( have_rows('page_content') ): ?>	

		    <?php while ( have_rows('page_content') ) : the_row(); ?>

		    	<div class="flexible-item flexible-item-<?php echo $rows; ?>">
		    		
					<?php get_template_part( 'template-parts/flexible/'.get_row_layout() ); ?>

					<?php $rows++; ?>

				</div>

		    <?php endwhile; ?>

		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
