<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	register_post_type( 'zia3_os',
	array(
	'menu_icon' => 'dashicons-format-gallery',
	'labels' => array(
	'name' => __( 'Zia3 OS' ),
	'singular_name' => __( 'Opening Sequence' ),
	'menu_name' => __( 'Zia3 Opening Sequences' ),
	'all_items' => __( 'All Opening Sequences' ),
	'add_new' => _x('Add Opening Sequence', 'Opening Sequence'),
	'add_new_item' => __('New Opening Sequence'),
	'edit_item' => __('Edit Opening Sequence'),
	'new_item' => __('New Opening Sequence'),
	'view_item' => __('View Opening Sequence'),
	'search_items' => __('Search Your Opening Sequences'),
	'not_found' =>  __('Nothing found'),
	'not_found_in_trash' => __('Nothing found in Trash'),
	),
	'public' => false,
	'has_archive' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'zia3_opening_sequences'),
	'capability_type' => 'post',
	'supports' => array('title'),
	'taxonomies' => array( 'zia3_os_sequence')));