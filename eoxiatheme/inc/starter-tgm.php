<?php

/**
 * Require the installation of any required and/or recommended third-party plugins here.
 * See http://tgmpluginactivation.com/ for more details
 */
function eoxia_starter_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'               => 'Advanced Custom Field',
			'slug'               => 'advanced-custom-field',
			'source'             => get_template_directory() . '/framework/plugins/advanced-custom-fields-pro.zip',
			'required'           => true,
			'version'            => '5.2.8',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			// 'image_url'          => AVADA_ADMIN_DIR . '../assets/images/fusion_core.png',
		),
		// array(
		// 	'name'               => 'Eoxia bloc widget',
		// 	'slug'               => 'eoxia-bloc-widget',
		// 	'source'             => get_template_directory() . '/framework/plugins/eoxia-bloc-widget.zip',
		// 	'required'           => false,
		// 	'version'            => '1.0.0',
		// 	'force_activation'   => false,
		// 	'force_deactivation' => false,
		// 	'external_url'       => ''
		// ),
		// array(
		// 	'name'               => 'Eoxia diaporama widget',
		// 	'slug'               => 'eoxia-diaporama-widget',
		// 	'source'             => get_template_directory() . '/framework/plugins/eoxia-diaporama-widget.zip',
		// 	'required'           => false,
		// 	'version'            => '1.0.0',
		// 	'force_activation'   => false,
		// 	'force_deactivation' => false,
		// 	'external_url'       => ''
		// ),
		// array(
		// 	'name'               => 'LayerSlider WP',
		// 	'slug'               => 'LayerSlider',
		// 	'source'             => get_template_directory() . '/framework/plugins/LayerSlider.zip',
		// 	'required'           => false,
		// 	'version'            => '5.6.2',
		// 	'force_activation'   => false,
		// 	'force_deactivation' => false,
		// 	'external_url'       => '',
		// 	'image_url'          => AVADA_ADMIN_DIR . '../assets/images/layer_slider.png',
		// ),
		// array(
		// 	'name'               => 'Revolution Slider',
		// 	'slug'               => 'revslider',
		// 	'source'             => get_template_directory() . '/framework/plugins/revslider.zip',
		// 	'required'           => false,
		// 	'version'            => '5.0.9',
		// 	'force_activation'   => false,
		// 	'force_deactivation' => false,
		// 	'external_url'       => '',
		// 	'image_url'          => AVADA_ADMIN_DIR . '../assets/images/rev_slider.png',
		// ),
		array(
			'name'      => 'Wpshop',
			'slug'      => 'wpshop',
			'required'  => false,
			// 'source' => 'https://wordpress.org/plugins/test'
			// 'image_url' => AVADA_ADMIN_DIR . '../assets/images/woocommerce.png',
		),
		array(
			'name'      => 'Contact form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
			// 'source' => 'https://wordpress.org/plugins/test'
			// 'image_url' => AVADA_ADMIN_DIR . '../assets/images/woocommerce.png',
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => true,
			// 'source' => 'https://wordpress.org/plugins/test'
			// 'image_url' => AVADA_ADMIN_DIR . '../assets/images/woocommerce.png',
		),
		// array(
		// 	'name'      => 'bbPress',
		// 	'slug'      => 'bbpress',
		// 	'required'  => false,
		// 	// 'image_url' => AVADA_ADMIN_DIR . '../assets/images/bbpress.png',
		// ),
		// array(
		// 	'name'      => 'The Events Calendar',
		// 	'slug'      => 'the-events-calendar',
		// 	'required'  => false,
		// 	// 'image_url' => AVADA_ADMIN_DIR . '../assets/images/the_events_calendar.png',
		// ),
		// array(
		// 	'name'      => 'Contact Form 7',
		// 	'slug'      => 'contact-form-7',
		// 	'required'  => false,
		// 	// 'image_url' => AVADA_ADMIN_DIR . '../assets/images/contact_form_7.jpg',
		// ),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'eoxiatheme';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(

		'domain'        	=> $theme_text_domain,
		'default_path'  	=> '',
		'parent_slug' 		=> 'themes.php',
		'menu'            	=> 'install-required-plugins',
		'has_notices'     	=> true,
		'is_automatic'    	=> true,
		'message'         	=> '',
		'strings'         	=> array(
			'page_title'                      => __( 'Install Required Plugins', 'eoxiatheme' ),
			'menu_title'                      => __( 'Install Plugins', 'eoxiatheme' ),
			'installing'                      => __( 'Installing Plugin: %s', 'eoxiatheme' ), // %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', 'eoxiatheme' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin installed or update: %1$s.', 'This theme requires the following plugins installed or updated: %1$s.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin installed or updated: %1$s.', 'This theme recommends the following plugins installed or updated: %1$s.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'eoxiatheme' ), // %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Go Install Plugin', 'Go Install Plugins', 'eoxiatheme' ),
			'activate_link'                   => _n_noop( 'Go Activate Plugin', 'Go Activate Plugins', 'eoxiatheme' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'eoxiatheme' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'eoxiatheme' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'eoxiatheme' ), // %1$s = dashboard link
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'eoxia_starter_register_required_plugins' );

// Omit closing PHP tag to avoid "Headers already sent" issues.
