<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function beflex_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'beflex_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function beflex_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'beflex_pingback_header' );

if ( ! function_exists( 'beflex_pagination' ) ) {
	/**
	 * More beautiful pagination
	 *
	 * @return void
	 */
	function beflex_pagination() {
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		$pagination = array(
			'base' => @add_query_arg('page','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'show_all' => false,
			'end_size'     => 1,
			'mid_size'     => 2,
			'type' => 'list',
			'next_text' => '»',
			'prev_text' => '«',
		);

		if ( $wp_rewrite->using_permalinks() ) :
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		endif;

		if ( ! empty( $wp_query->query_vars['s'] ) ) :
			$pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );
		endif;

		echo str_replace( 'page/1/','', paginate_links( $pagination ) ); // WPCS: XSS ok.
	}
}
