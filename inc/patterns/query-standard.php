<?php
/**
 * Pattern: Query loop block, Standard design with button
 *
 * @package Beflex
 * @since 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	'title'      => __( 'Call To Action - Standard', 'beflex' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'keywords'   => array( 'beflex', 'query' ),
	'content'    => '<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
					<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
					<!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

					<!-- wp:post-title {"isLink":true} /-->

					<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read more', 'beflex' ) . '","className":"wp-button"} /-->
					<!-- /wp:post-template --></div>
					<!-- /wp:query -->',
);
