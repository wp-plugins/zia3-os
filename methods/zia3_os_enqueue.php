<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post;

	wp_register_script('zia3-os-modernizr-custom', plugins_url('../js/modernizr.custom.js',__FILE__),  null, 1 );

	wp_enqueue_script('zia3-os-modernizr-custom');


