<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//only load these scripts when metaboxes are visible
    if(is_admin()) { /* loading of your scripts in the admin*/
		wp_register_script( 'meta_fields', plugins_url( '../../js/meta-fields.js', __FILE__ ));

		wp_enqueue_script( 'meta_fields' );
	}

// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
		array(
				'label'=> 'Text Input',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'text',
				'type'  => 'text'
		),
		array(
				'label'=> 'Textarea',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'textarea',
				'type'  => 'textarea'
		),
		array(
				'label'=> 'Checkbox Input',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'checkbox',
				'type'  => 'checkbox'
		),
		array(
				'label'=> 'Select Box',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'select',
				'type'  => 'select',
				'options' => array (
						'one' => array (
								'label' => 'Option One',
								'value' => 'one'
						),
						'two' => array (
								'label' => 'Option Two',
								'value' => 'two'
						),
						'three' => array (
								'label' => 'Option Three',
								'value' => 'three'
						)
				)
		),
		array (
				'label' => 'Checkbox Group',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'checkbox_group',
				'type'  => 'checkbox_group',
				'options' => array (
						'one' => array (
								'label' => 'Option One',
								'value' => 'one'
						),
						'two' => array (
								'label' => 'Option Two',
								'value' => 'two'
						),
						'three' => array (
								'label' => 'Option Three',
								'value' => 'three'
						)
				)
		),
		array(
				'label' => 'Custom CSS Files',
				'desc'  => 'Select the CSS files to be included.',
				'id'    => $prefix.'checkbox_group_css',
				'type'  => 'checkbox_group_combo_css',
				'options' => array (

				)
		),
		array(
				'label' => 'Custom JavaScript Files',
				'desc'  => 'Select the JavaScript files to be included.',
				'id'    => $prefix.'checkbox_group_js',
				'type'  => 'checkbox_group_combo_js',
				'options' => array (

				)
		),
		array(
				'label' => 'Repeatable',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'repeatable',
				'type'  => 'repeatable'
		)
);


$zia3_meta_fields = array(
		array(
				'label' => 'Repeatable',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'repeatable',
				'link'  => '<a href=""></a>',
				'type'  => 'repeatable_combo'
		),
		array (
				'label' => 'Checkbox Group',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'checkbox_group',
				'type'  => 'checkbox_group_combo',
				'options' => array (
						'one' => array (
								'label' => 'Option One',
								'value' => 'one',
								'link' => 'http://zia3.com'
						),
						'two' => array (
								'label' => 'Option Two',
								'value' => 'two',
								'link' => 'http://zia3.com'
						),
						'three' => array (
								'label' => 'Option Three',
								'value' => 'three',
								'link' => 'http://zia3.com'
						)
				)
		),
		array (
				'label' => 'Checkbox Group',
				'desc'  => 'A description for the field.',
				'id'    => $prefix.'checkbox_group',
				'type'  => 'checkbox_group_combo',
				'options' => array (
						'one' => array (
								'label' => 'Option Two',
								'value' => 'two',
								'link' => 'http://zia3.com'
						)
				)
		)

);

$phrases_meta_box_def = array(
	        array(
					'label' => 'Opening Phrases',
					'desc'  => 'Enter Phrase for Opening Sequence',
					'id'    => $prefix.'repeatable',
					'type'  => 'repeatable'
			)
);

$shortcode_meta_box_def = array(
	        array(
					'label' => 'Repeatable',
					'desc'  => 'Enter Phrase for Opening Sequence',
					'id'    => $prefix.'repeatable',
					'type'  => 'repeatable'
			)
);


function zia3_os_show_meta_box_phrases() {
	global $custom_meta_fields;
	$custom_meta_fields = $phrases_meta_box_def;
}

function zia3_os_show_meta_box_shortcode() {
	global $custom_meta_fields;
	$custom_meta_fields = $shortcode_meta_box_def;
}

    global $custom_meta_fields;
    global $post;

	$custom_meta_fields = $phrases_meta_box_def;

	// Begin the field table and loop
	echo '<div>';
	// Use nonce for verification
	echo '<input type="hidden" name="zia3_os_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
						<td>';
		switch($field['type']) {
			// case items will go here
			// text
			case 'text':
				echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> <br /><span class="description">'.$field['desc'].'</span>';
				break;
				// textarea
			case 'textarea':
				echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> <br /><span class="description">'.$field['desc'].'</span>';
				break;
				// checkbox
			case 'checkbox':
				echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> <label for="'.$field['id'].'">'.$field['desc'].'</label>';
				break;
				// checkbox_group
			case 'checkbox_group':
				foreach ($field['options'] as $option) {
					echo '
							<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
									<label for="'.$option['value'].'">'.$option['label'].'</label><br />';
				}
				echo '<span class="description">'.$field['desc'].'</span>';
				break;
				// checkbox_group_combo
			case 'checkbox_group_combo':
				foreach ($field['options'] as $option) {
					echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
							<label for="'.$option['value'].'">'.$option['label'].'</label>
									<a href="'.$option['link'].'">'.$option['link'].'</a><br />';
				}
				echo '<span class="description">'.$field['desc'].'</span>';
				break;
				// checkbox_group_combo_css
			case 'checkbox_group_combo_css':
				foreach ($field['options'] as $option) {
					echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
							<label for="'.$option['value'].'">'.$option['label'].'</label>
									<a href="'.$option['link'].'">'.$option['link'].'</a><br />';
				}
				echo '<span class="description">'.$field['desc'].'</span>';
				break;
				// checkbox_group_combo_js
			case 'checkbox_group_combo_js':
				foreach ($field['options'] as $option) {
					echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
							<label for="'.$option['value'].'">'.$option['label'].'</label>
									<a href="'.$option['link'].'">'.$option['link'].'</a><br />';
				}
				echo '<span class="description">'.$field['desc'].'</span>';
				break;
				// select
			case 'select':
				echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
				}
				echo '</select><br /><span class="description">'.$field['desc'].'</span>';
				break;
				// radio
			case 'radio':
				foreach ( $field['options'] as $option ) {
					echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'" ',$meta == $option['value'] ? ' checked="checked"' : '',' />
							<label for="'.$option['value'].'">'.$option['label'].'</label><br />';
				}
				break;
				// radio_group
			case 'radio_group':
				foreach ( $field['options'] as $option ) {
					echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'" ',$meta == $option['value'] ? ' checked="checked"' : '',' />
							<label for="'.$option['value'].'">'.$option['label'].'</label><br />';
				}
				break;
				// repeatable
			case 'repeatable':
				echo '<a class="repeatable-add button" href="#">+</a>
						<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
				$i = 0;
				if ($meta) {
					foreach($meta as $row) {
						echo '<li>
								<span class="sort hndle">|||</span>
								<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="'.$row.'" size="50" />
										<a class="repeatable-remove button" href="#">-</a></li>';
						$i++;
					}
				} else {
					echo '<li><span class="sort hndle">|||</span>
							<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="" size="30" />
									<a class="repeatable-remove button" href="#">-</a></li>';
				}
				echo '</ul>
						<span class="description">'.$field['desc'].'</span>';
				break;
				// repeatable
			case 'repeatable_combo':
				echo '<a class="repeatable-add button" href="#">+</a>
						<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
				$i = 0;
				if ($meta) {
					foreach($meta as $row) {
						echo '<li><span>'.$field['link'].'</span>
								<span class="sort hndle">|||</span>
								<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="'.$row.'" size="30" />
										<a class="repeatable-remove button" href="#">-</a></li>';
						$i++;
					}
				} else {
					echo '<li><span>'.$field['link'].'</span>
							<span class="sort hndle">|||</span>
							<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="" size="30" />
									<a class="repeatable-remove button" href="#">-</a></li>';
				}
				echo '</ul>
						<span class="description">'.$field['desc'].'</span>';
				break;
		} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
	echo '</div>'; // end div



// Save the Data
function zia3_os_save_custom_meta($post_id) {
	global $custom_meta_fields;

	// verify nonce
	if (!wp_verify_nonce($_POST['zia3_os_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

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
}
add_action('save_post', 'zia3_os_save_custom_meta');

//return array of files in path
function zia3_os_display_files_in_dir($path) {
	$files[] = array();
	if(is_dir($path)) {
		if ($handle = opendir($path)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					//echo "$entry\n";
					$files[] = $entry;
				}
			}
			closedir($handle);
		}
	}
	return $files;
}

function zia3_os_in_multiarray($elem, $array)
{
	$top = sizeof($array) - 1;
	$bottom = 0;
	while($bottom <= $top)
	{
		if($array[$bottom] == $elem)
			return true;
		else
		if(is_array($array[$bottom]))
		if(in_multiarray($elem, ($array[$bottom])))
			return true;

		$bottom++;
	}
	return false;
}
?>