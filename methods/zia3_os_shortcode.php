<?php
if ( ! defined( 'ABSPATH' ) ) exit;

    $atts = shortcode_atts(array('id' => '', 'link_title'=> 'Enter Here', 'link' => 'http://zia3.com', 'slogan' => 'slogan', 'slogan_link' => 'slogan_link', 'link_color' => 'link_color',
            'slogan_link_color' => 'slogan_link_color'), $atts);
    $phrases = get_post_meta( $atts['id'], 'phraseIDs', true );

    //Variables
    $link_title = $atts['link_title'];
    $link = $atts['link'];
	$link_color = $atts['link_color'];
    $slogan = $atts['slogan'];
    $slogan_link = $atts['slogan_link'];
	$slogan_link_color = $atts['slogan_link_color'];


    //Enque Dynamic CSS specific to the chosen opening sequence
    wp_register_style('zia3-os-style', plugins_url('../css/zia3-os-dynamic-style.css.php'."?zia3_os_sequence_id=".$atts['id'], __FILE__), null, 'all');
    wp_enqueue_style('zia3-os-style');


    $phrase = explode(",", $phrases);
    $phrasenum = count($phrase);

    $replacement = '';

    $replacement .= <<<HEREDOC


<!--  Start Zia3 Opening Sequence-->
<div class="zia3-os-phrases" id="zia3-os-phrases">

HEREDOC;

    global $custom_meta_fields;
	$zia3_os_phrases_meta_key = 'custom_repeatable';
    $my_zia3_os_meta = get_post_meta($atts['id'], $zia3_os_phrases_meta_key, true);
	//inset phrases
	if (is_page() || is_single()) {
		// loop through fields and insert the data
		if($my_zia3_os_meta) {
			foreach ($my_zia3_os_meta as $field) {
				$replacement .= "<h2>" .$field. "</h2>\n";
			}
		}
		rewind_posts();
	}

    $replacement .= '</div>';

    $replacement .= <<<HEREDOC

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
HEREDOC;

    $replacement .=  "<script src='".plugins_url('../js/jquery.zia3.os.lettering.js', __FILE__)."'></script>";

	$replacement .= <<<HEREDOC

		<script>
			$(document).ready(function() {
				$("#zia3-os-phrases > h2").lettering('words').children("span").lettering().children("span").lettering();
			})
		</script>
HEREDOC;

    $replacement .= '<div id="zia3_os_enter_here">';

    if( $link || $link_title ){
    	$replacement .= '<p><a title="'.$link_title.'" style="color: rgb('.$link_color.')" href="'.$link.'">'.$link_title.'</a></p>';
    } else {
    	$replacement .= '<p><a title="Enter Here" style="color: rgb(255,255,255)" href="http://zia3.com">Enter•Here</a></p>';
    }
    if( $slogan || $slogan_link ){
    	$replacement .= '<p><a title="'.$slogan.'" style="color: rgb('.$slogan_link_color.')" href="'.$slogan_link.'">'.$slogan.'</a></p>';
    } else {
    	$replacement .= '<p><a title="Zia3 Opening Sequence" style="color: rgb(255,255,255)" href="http://plugins.zia3.com">Zia3•OS</a></p>';
    }

    $replacement .= '</div>';

    $replacement .= <<<HEREDOC

HEREDOC;



