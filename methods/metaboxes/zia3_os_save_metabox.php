<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
  	return;

    // OK, we're authenticated: we need to find and save the data

    if (!current_user_can('edit_post', $post_id))
  	return;

    if( !isset( $_POST['phraseIDs'] ) )
	$phraseIDs = '';

    if( !isset( $_POST['genShortcode'] ) )
	$genShortcode = '';

	// Field Array
	$prefix = 'custom_';
    $custom_meta_fields = array(
	        array(
					'label' => 'Opening Phrases',
					'desc'  => 'Enter Phrase for Opening Sequence',
					'id'    => $prefix.'repeatable',
					'type'  => 'repeatable'
			)
	);

	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach

    if( isset( $_POST['phraseIDs'] ) )
	$phraseIDs = sanitize_text_field( $_POST['phraseIDs'] );
	add_post_meta($post_id, "phraseIDs", $phraseIDs, true) or update_post_meta( $post_id, "phraseIDs", $phraseIDs );

    if( isset( $_POST['genShortcode'] ) )
	$genShortcode = sanitize_text_field( $_POST['genShortcode'] );
	add_post_meta($post_id, "genShortcode", $genShortcode, true) or update_post_meta( $post_id, "genShortcode", $genShortcode );
