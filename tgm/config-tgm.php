<?php
/*
 * TGM
 */
class desvertCoreRequiredPlugins {


	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'desvertcore_register_required_plugins' ) );
	}

	public function desvertcore_register_required_plugins() {

		$plugins = array(

			
			array(
				'name'               => esc_html__( 'Advanced Custom Fields Pro', 'desvertcore' ),
				'slug'               => 'advanced-custom-fields-pro',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => plugin_dir_path(__FILE__)."plugins/advanced-custom-fields-pro.zip",
			),
		
		);

		// Change this to your theme text domain, used for internationalising strings
		$config = array(
			'domain'       => 'desvertcore', // Text domain - likely want to be the same as your theme.
			'default_path' => '', // Default absolute path to pre-packaged plugins
			'parent_slug'  => 'themes.php',
			'menu'         => 'install-required-plugins', // Menu slug
			'has_notices'  => true, // Show admin notices or not
			'is_automatic' => false, // Automatically activate plugins after installation or not
			'message'      => '', // Message to output right before the plugins table
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'desvertcore' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'desvertcore' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'desvertcore' ), // %1$s = plugin name
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'desvertcore' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'desvertcore' ), // %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'desvertcore' ), // %1$s = plugin name(s)
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'desvertcore' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'desvertcore' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'desvertcore' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'desvertcore' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'desvertcore' ),
				'nag_type'                        => 'updated',
			),
		);

		tgmpa( $plugins, $config );
	}
}
new desvertCoreRequiredPlugins();