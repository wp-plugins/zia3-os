<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


    add_filter( 'admin_footer_text', 'zia3_os_footer_text' );
	add_filter( 'update_footer', 'zia3_os_footer_version', 11 );

	function zia3_os_footer_text() {
		$plugin_dir = plugins_url('zia3-os/images/zia3_logo.png');
        $default = '<br><p>&nbsp;</p><p><div class="zia3_os_logo"><a href="http://zia3.com" title="Zia3"><img src="'. $plugin_dir .'" alt="Zia3"/></a></div></p>';
	    return $default;
	}

	function zia3_os_footer_version( ) {
	    return '';
	}

    global $wp_version;
	$plugin = plugin_basename( __FILE__ );
	$plugin_data = get_plugin_data( __FILE__, false );

	if ( version_compare($wp_version, "3.5", "<" ) ) {
		if( is_plugin_active($plugin) ) {
			deactivate_plugins( $plugin );
			wp_die( "'".$plugin_data['Name']."' requires WordPress 3.5 or higher, and has been deactivated!  Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>." );
        }
}

