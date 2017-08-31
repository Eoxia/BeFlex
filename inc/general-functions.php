<?php
/**
 * Functions used by theme
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

if ( ! function_exists( 'is_wpshop' ) ) :
	/**
	 * Returns true if wpshop plugin is active in the theme
	 *
	 * @return boolean
	 */
	function is_wpshop() {
		if ( class_exists( 'wpshop_products' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'is_acf' ) ) :
	/**
	 * Returns true if ACF plugin is active in the theme
	 *
	 * @return boolean
	 */
	function is_acf() {
		if ( class_exists( 'acf' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'is_yoast' ) ) :
	/**
	 * Returns true if YOAST plugin is active in the theme
	 *
	 * @return boolean
	 */
	function is_yoast() {
		if ( function_exists( 'yoast_breadcrumb' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'beflex_notification' ) ) :
	/**
	 * Print an alert for the user
	 *
	 * @param  string $string The message.
	 * @param  string $alert  The class type for css.
	 * @param  string $link  a possible link to another page.
	 * @return void
	 */
	function beflex_notification( $string = '', $alert = 'info', $link = '' ) {
		if ( ! empty( $link ) ) :
			$link = '<a class="full" href="' . esc_html( $link ) . '"></a>';
		endif;

		printf( wp_kses(
			__( '<div class="notification %1$s">%2$s%3$s</div>', 'beflex' ),
			array(
				'div' => array(
					'class' => array(),
				),
			)
		), esc_html( $alert ), esc_html( $string ), $link );
	}
endif;

if ( ! function_exists( 'beflex_allowed' ) ) :
	/**
	 * Check if the user have the allowed role
	 *
	 * @param  array  $user Current user role.
	 * @param  string $role Roles allowed separated by comma.
	 * @return boolean
	 */
	function beflex_allowed( $user = 'editor', $role = 'editor,administrator' ) {
		$allowed_roles = explode( ',', $role );
		if ( is_user_logged_in() && array_intersect( $allowed_roles, $user ) ) :
			return true;
		else :
			return false;
		endif;
	}
endif;

if ( ! function_exists( 'beflex_darken_color' ) ) :
	/**
	 * Change the Hue of a color
	 *
	 * @param  string  $couleur       Hexa couleur.
	 * @param  integer $changement_ton Lighten or Darken.
	 * @return string The final color
	 */
	function beflex_change_color( $couleur, $changement_ton ) {
		$couleur = substr( $couleur, 1, 6 );
		$cl = explode( 'x', wordwrap( $couleur, 2, 'x', 3 ) );
		$couleur = '';
		for ( $i = 0; $i <= 2; $i++ ) {
			$cl[ $i ] = hexdec( $cl[ $i ] );
			$cl[ $i ] = $cl[ $i ] + $changement_ton;
			if ( $cl[ $i ] < 0 ) :
				$cl[ $i ] = 0;
			endif;
			if ( $cl[ $i ] > 255 ) :
				$cl [ $i ] = 255;
			endif;
			$couleur .= StrToUpper( substr( '0' . dechex( $cl[ $i ] ), -2 ) );
		}
		return '#' . $couleur;
	}
endif;
