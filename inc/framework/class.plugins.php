<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Arte WP for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/vendor/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'arte_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function arte_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */

	$plugins_base = 'https://39mqioqkze.execute-api.us-east-1.amazonaws.com/prod/get-plugin';
	$plugins = array(
		'xtender' => array( '1.5.8', '1C6C50B9-2D83-4106-A7C9-D55217859FA9' ),
		'js_composer' => array( '6.13.0', 'CF4CB276-8C16-4673-82CF-E379B88C4447' ),
		'revslider' => array( '6.6.14', '7FED997A-8989-45FF-8CFF-C59CAD275807' ),
		'weekly-class' => array( '2.6.0', '133A892B-A797-48F4-98B4-F0CFA6A2DDFC' )
	);

	$plugins = array(

    array(
           'name' 					=> esc_html__( 'WPBakery Page Builder', 'arte' ),
           'slug' 					=> 'js_composer',
           'source' 				=> add_query_arg( array( 'id' => $plugins['js_composer'][1] ), $plugins_base ),
           'required' 			    => true,
           'version' 				=> $plugins['js_composer'][0],
           'force_activation' 		=> false,
           'force_deactivation' 	=> false,
           'external_url' 			=> '',
       ),
       array(
           'name' 					=> esc_html__( 'Revolution Slider', 'arte' ),
           'slug' 					=> 'revslider',
           'source' 				=> add_query_arg( array( 'id' => $plugins['revslider'][1]), $plugins_base ),
           'required' 			    => true,
           'version' 				=> $plugins['revslider'][0],
           'force_activation' 		=> false,
           'force_deactivation' 	=> false,
           'external_url' 			=> '',
       ),
		array(
           'name' 					=> esc_html__( 'Events Schedule WP Plugin', 'arte' ),
           'slug' 					=> 'weekly-class',
           'source' 				=> add_query_arg( array( 'id' => $plugins['weekly-class'][1] ), $plugins_base ),
           'required' 			    => false,
           'version' 				=> $plugins['weekly-class'][0],
           'force_activation' 		=> false,
           'force_deactivation' 	=> false,
           'external_url' 			=> '',
       ),
		array(
           'name' 					=> esc_html__( 'xtender', 'arte' ),
           'slug' 					=> 'xtender',
           'source' 				=> add_query_arg( array( 'id' => $plugins['xtender'][1] ), $plugins_base ),
           'required' 			    => true,
           'version' 				=> $plugins['xtender'][0],
           'force_activation' 		=> false,
           'force_deactivation' 	=> false,
           'external_url' 			=> '',
       ),
		array(
           'name' 					=> esc_html__( 'Contact Form 7', 'arte' ),
           'slug' 					=> 'contact-form-7',
           'required' 			    => true
       )

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'arte',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'arte' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'arte' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'arte' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'arte' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'arte' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'arte'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'arte'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'arte'
			),
			'notice_ask_to_update_maybe'      => _n_noop(

				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'arte'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'arte'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'arte'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'arte'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'arte'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'arte'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'arte' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'arte' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'arte' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'arte' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'arte' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'arte' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'arte' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'arte' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'arte' ),
			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),

	);

	tgmpa( $plugins, $config );
}
