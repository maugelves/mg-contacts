<?php



class MGCONT_Base {

	/**
	 * Check the plugin dependencies
	 */
	public static function check_plugin_dependencies() {
		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin from an arbitrary external source in your theme.
			array(
				'name'         => 'Advanced Custom Fields PRO', // The plugin name.
				'slug'         => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => 'https://www.advancedcustomfields.com/pro/', // If set, overrides default API URL and points to an external URL.
			),
		);

		tgmpa( $plugins );

	}


}

$MCONT_plugin_base = new MGCONT_Base();