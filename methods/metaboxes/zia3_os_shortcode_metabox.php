<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post;
	$id = get_the_ID();
    wp_register_script('zia3-os-shortcode-generator', plugins_url('../../js/shortcodegenerator.js',__FILE__), array('jquery'), null, 1 );
	wp_register_style('zia3-os-admin', plugins_url('../../css/zia3.os.admin.css', __FILE__), null, 1);

    wp_enqueue_style('zia3-os-admin');
    wp_enqueue_script('zia3-os-shortcode-generator');



    //Variables
    $genShortcodeArray = get_post_meta( $id, 'genShortcode', true );
	$genShortcodeArray = str_replace('"', "", $genShortcodeArray);
	$genShortcodeArray = str_replace("'", "", $genShortcodeArray);
	$genShortcodeArray = str_replace('[', "", $genShortcodeArray);
	$genShortcodeArray = str_replace(']', "", $genShortcodeArray);

    preg_match_all("/([^ = ]+)=([^ = ]+)/", $genShortcodeArray, $match);
    $result = array_combine($match[1], $match[2]);


    $link_title = $result['link_title'];
    $link = $result['link'];
	$link_color = $result['link_color'];
    $slogan = $result['slogan'];
    $slogan_link = $result['slogan_link'];
	$slogan_link_color = $result['slogan_link_color'];
	$font_size = $result['font_size'];


    $genShortcode = get_post_meta( $id, 'genShortcode', true );


	$genShortcode = str_replace('"', "'", $genShortcode);
	$exampleGenShortcode = str_replace('"', "'", $exampleGenShortcode);

	if ( !isset( $genShortcode ) || empty( $genShortcode ) ){
		echo '<form><input type="button" class="button" name="zia3_os_shortcodeg_button" id="zia3_os_shortcodeg_button" value="Generate Your Own Shortcode" /><br><br>';
		echo '<div id="zia3_os_example_shortcode">Example Shortcode: <input type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" style="width:650px;max-width:100%" value="[ zia3-os id=\'' . $id .
		     '\' link_title=\'My Title\' link=\'http://mydomain.com/\' slogan=\'My Slogan\' slogan_link=\'http://mydomain.com/\' link_color=\'255,255,255\' slogan_link_color=\'255,255,255\' font_size=\'30\' ]"/> </div>';
		$exampleGenShortcode = '[ zia3-os id=\'' . $id . '\' link_title=\'My Title\' link=\'http://mydomain.com/\' slogan=\'My Slogan\' slogan_link=\'http://mydomain.com/\' link_color=\'255,255,255\' slogan_link_color=\'255,255,255\' font_size=\'30\' ]';
		$genShortcode = $exampleGenShortcode;
	}
	else{
		echo '<form><input type="button" class="button" name="zia3_os_shortcodeg_button" id="zia3_os_shortcodeg_button" value="Generate a New Shortcode" /><br><br>';
		echo '<div id="zia3_os_example_shortcode">Your Custom Shortcode: <input type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" style="width:650px;max-width:100%" value="' . $genShortcode .'"/></div>';
		$exampleGenShortcode = $genShortcode;
		$exampleGenShortcode = str_replace('"', "'", $exampleGenShortcode);
	}


?>

<div id="zia3_os_shortcode_generator">
	<h3>Shortcode Generator</h3><br>
	Shortcode ID: <input type="text" id="id" spellcheck="false" readonly="readonly" value="<?php echo $id ?>" />
	<h3>Opening Sequence Page Link and Title</h3><br>
	Opening Sequence Font Size: <input type="text" id="font_size" spellcheck="false" value="<?php echo $font_size ?>" /><br>
	Title: <input type="text" id="link_title" spellcheck="false" value="<?php echo $link_title ?>" /><br>
	Link: <input type="text" id="link" spellcheck="false" value="<?php echo $link ?>" /><br>
	Slogan: <input type="text" id="slogan" spellcheck="false" value="<?php echo $slogan ?>" /><br>
	Slogan Link: <input type="text" id="slogan_link" spellcheck="false" value="<?php echo $slogan_link ?>" /><br>
	Link Color: <input type="text" id="link_color" spellcheck="false" value="<?php echo $link_color ?>" /><br>
	Slogan Link Color: <input type="text" id="slogan_link_color" spellcheck="false" value="<?php echo $slogan_link_color ?>" /><br>
	<input type="button" class="button" name="zia3_os_generate_button" id="zia3_os_generate_button" value="Generate Shortcode!" />
	<input type="button" class="button" name="zia3_os_help_button" id="zia3_os_help_button" value="Explain What All of This Means..." />
	<br><br>
	<div id="zia3_os_generated_shortcode_container">
		Generated Shortcode: <input id="zia3_os_generated_shortcode" type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" name="genShortcode" value="<?php echo $exampleGenShortcode ?>" />
	</div>
</div>

<div id="zia3_os_parameter_explaination">
<h3>Opening Sequence Font Size</h3>
<p>The font size in pixels of the phrases you entered. Please adjust to your liking.</p>
<h3>Title</h3>
<p>The title text for the link on the opening sequence page which will be clicked on to go to the link specified.</p>
<h3>Link</h3>
<p>The link for the title you specified on the opening sequence page.</p>
<h3>Slogan</h3>
<p>The slogan text for the link on the opening sequence page which will be clicked on to go to the link specified.</p>
<h3>Slogan Link</h3>
<p>The link for the slogan you specified on the opening sequence page.</p>
<h3>Link Color</h3>
<p>The RGB color code for the link. Default = 255,255,255 white</p>
<h3>Slogan Link Color</h3>
<p>The RGB color code for the slogan link. Default = 255,255,255 white</p>
<hr>
<p>After you've generated your shortcode remember to hit Publish or Update so you can come back and copy/paste the shortcode later if you need to.</p>
<input type="button" class="button" name="zia3_os_help_back_button" id="zia3_os_help_back_button" value="Thanks! Now take me back to the shortcode generator!" />
</div>
</form>