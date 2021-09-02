<?php
/**
 * Block patterns
 *
 * @package Beflex
 * @since 4.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'design',
		array( 'label' => esc_html__( 'Design', 'beflex' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'beflex/columns-media',
		array(
			'title'      => esc_html__('Columns width rounded media and text', 'beflex'),
			'categories' => array('design'),
			'keywords'   => array( 'beflex', 'design' ),
			'content'    => '
			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textAlign":"center"} -->
			<h2 class="has-text-align-center">Title</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"align":"center","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-thumbnail"><img src="' . esc_url( get_theme_file_uri( 'assets/images/thumbnail.jpg' ) ) . '" alt=""/></figure></div>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"contentJustification":"center"} -->
			<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link">Button link</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textAlign":"center"} -->
			<h2 class="has-text-align-center">Title</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"align":"center","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-thumbnail"><img src="' . esc_url( get_theme_file_uri( 'assets/images/thumbnail.jpg' ) ) . '" alt=""/></figure></div>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"contentJustification":"center"} -->
			<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link">Button link</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textAlign":"center"} -->
			<h2 class="has-text-align-center">Title</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"align":"center","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-thumbnail"><img src="' . esc_url( get_theme_file_uri( 'assets/images/thumbnail.jpg' ) ) . '" alt=""/></figure></div>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"contentJustification":"center"} -->
			<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link">Button link</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->
			',
		)
	);

	register_block_pattern(
		'beflex/media-content-background',
		array(
			'title'      => esc_html__('Image and content with background', 'beflex'),
			'categories' => array('design'),
			'keywords'   => array( 'beflex', 'design' ),
			'content'    => '
			<!-- wp:media-text {"mediaType":"image","mediaWidth":60,"verticalAlignment":"center","imageFill":false,"backgroundColor":"caribbean"} -->
			<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center has-caribbean-background-color has-background" style="grid-template-columns:60% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_theme_file_uri( 'assets/images/paysage.jpg' ) ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading -->
			<h2>Title</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"galaxy"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-galaxy-background-color has-background">Button link</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div></div>
			<!-- /wp:media-text -->
			',
		)
	);
}
