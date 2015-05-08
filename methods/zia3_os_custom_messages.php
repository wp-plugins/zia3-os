<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post, $post_ID;
	$messages['zia3_os'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( __('Opening Sequence updated.') ),
	2 => __('Custom Field updated.'),
	3 => __('Custom Field deleted.'),
	4 => __('Opening Sequence updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( __('Opening Sequence restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( __('Opening Sequence published.') ),
	7 => __('Opening Sequence saved.'),
	8 => sprintf( __('Opening Sequence submitted.') ),
	9 => sprintf( __('Opening Sequence scheduled for: <strong>%1$s</strong>.'),
 	 // translators: Publish box date format, see http://php.net/date
  	date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( __('Opening Sequence draft updated.') )
	);