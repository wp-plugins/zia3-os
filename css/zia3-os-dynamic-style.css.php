<?php

    header("Content-type: text/css; charset: UTF-8");

    require_once('../../../../wp-load.php');
	require_once('../../../../wp-includes/post.php');

    global $custom_meta_fields;
	global $post;
	$zia3_os_phrases_meta_key = 'custom_repeatable';

    $sequence_id = $_GET["zia3_os_sequence_id"];
    //$atts = shortcode_atts(array('id' => ''), $atts);
    $phrases = get_post_meta( $sequence_id, $zia3_os_phrases_meta_key, true );

    //$my_zia3_os_meta = get_post_meta($atts['id'], $zia3_os_phrases_meta_key, true);
	$phrasenum = count($phrases);

    $delay = 5;

	$atts = shortcode_atts(array('id' => '', 'font_family' => 'Trocchi', 'font_size' => '800', 'pos_left' => '220' , 'pos_top' => '220', 'rw_height' => '80',
            'rw_width' => '400', 'words_pos' => '3' ), $atts);
	$genShortcode = get_post_meta( $sequence_id, 'genShortcode', true );

    //Variables
    $genShortcodeArray = get_post_meta( $sequence_id, 'genShortcode', true );
	$genShortcodeArray = str_replace('"', "", $genShortcodeArray);
	$genShortcodeArray = str_replace("'", "", $genShortcodeArray);
	$genShortcodeArray = str_replace('[', "", $genShortcodeArray);
	$genShortcodeArray = str_replace(']', "", $genShortcodeArray);

    preg_match_all("/([^ = ]+)=([^ = ]+)/", $genShortcodeArray, $match);
    $result = array_combine($match[1], $match[2]);

	$font_size = $result['font_size'];


?>
@import url(http://fonts.googleapis.com/css?family=Lato:300,400,700|Dosis:200,600);

*, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
body, html { font-size: 100%; padding: 0; margin: 0; height: 100%; margin: 0;}

/* Clearfix hack by Nicolas Gallagher: http://nicolasgallagher.com/micro-clearfix-hack/ */
.clearfix:before, .clearfix:after { content: " "; display: table; }
.clearfix:after { clear: both; }



body {
    font-family: 'Lato', Calibri, Arial, sans-serif;
    color: #fff;
    background: #000;
    height: 100%;
    margin: 0;
}

a {
	color: #f0f0f0;
	text-decoration: none;
}

a:hover {
	color: #fff;
}

#zia3-os-phrases {
    min-height: 100%;
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(0,0,0,1);
    z-index: 10;
}

.zia3-os-phrases h2 {
	font-family: 'Dosis', 'Lato', sans-serif;
	font-size: <?php echo $font_size; ?>px;
	font-weight: 200;
	width: 100%;
	overflow: hidden;
	text-transform: uppercase;
	padding: 0;
	margin: 0;
	position: absolute;
	top: 0;
	left: 0;
	letter-spacing: 14px;
	text-align: center;
}

.zia3-os-phrases h2,
.zia3-os-phrases h2 > span {
	height: 100%;
	/* Centering with flexbox */
	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-direction: row;
	-ms-flex-direction: row;
	flex-direction: row;
	-webkit-box-pack: center;
	-moz-box-pack: center;
	-webkit-justify-content: center;
	-ms-flex-pack: center;
	justify-content: center;
	-webkit-box-align: center;
	-moz-box-align: center;
	-webkit-align-items: center;
	-ms-flex-align: center;
	align-items: center;
}

.zia3-os-phrases h2 > span {
	margin: 0 15px;
}

.zia3-os-phrases h2 > span > span {
	display: inline-block;
	-webkit-perspective: 1000px;
	-moz-perspective: 1000px;
	perspective: 1000px;
	-webkit-transform-origin: 50% 50%;
	-moz-transform-origin: 50% 50%;
	transform-origin: 50% 50%;
}
<?php
$counter = 0;
	while ($counter <= $phrasenum) {
		if($counter == 0) {
?>
.zia3-os-phrases h2 > span > span > span {
	display: inline-block;
	color: hsla(0,0%,0%,0);
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	transform-style: preserve-3d;
	-webkit-transform: translate3d(0,0,0);
	-moz-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
	-webkit-animation: Zia3OpeningSequence 5.2s linear forwards;
	-moz-animation: Zia3OpeningSequence 5.2s linear forwards;
	animation: Zia3OpeningSequence 5.2s linear forwards;
}
<?php
		}
		elseif ($counter == 4) {
?>
.zia3-os-phrases h2:nth-child(5) > span > span > span {
	font-size: 1.5em;
	-webkit-animation-delay: 21s;
	-moz-animation-delay: 21s;
	animation-delay: 21s;
	-webkit-animation-duration: 8s;
	-moz-animation-duration: 8s;
	animation-duration: 8s;
}
<?php
		}
		elseif ($counter == 5) {
?>
.zia3-os-phrases h2:nth-child(<?php echo  $counter+1 ?>) > span > span > span {
	-webkit-animation-delay: 30s;
	-moz-animation-delay: 30s;
	animation-delay: 30s;
}
<?php
		}
		elseif ($counter == 6) {
?>
.zia3-os-phrases h2:nth-child(<?php echo  $counter+1 ?>) > span > span > span {
	-webkit-animation-delay: 34s;
	-moz-animation-delay: 34s;
	animation-delay: 34s;
}
<?php
		}
		elseif ($counter == $phrasenum) {
?>
.zia3-os-phrases h2:nth-child(<?php echo  $phrasenum ?>) > span > span > span {
	font-size: <?php echo $font_size; ?>px;
	-webkit-animation: FadeIn 4s linear <?php echo  $phrasenum*$delay ?>s forwards;
	-moz-animation: FadeIn 4s linear <?php echo  $phrasenum*$delay ?>s forwards;
	animation: FadeIn 4s linear <?php echo  $phrasenum*$delay ?>s forwards;
}
<?php
		}
		else {
			if ($counter+1 != $phrasenum) {
?>
.zia3-os-phrases h2:nth-child(<?php echo  $counter+1 ?>) > span > span > span {
	-webkit-animation-delay: <?php echo  $counter*$delay ?>s;
	-moz-animation-delay: <?php echo  $counter*$delay ?>s;
	animation-delay: <?php echo  $counter*$delay ?>s;
}
<?php
			}
		}

        $counter = $counter +1;
	}
?>

@-webkit-keyframes Zia3OpeningSequence {
	0% {
		text-shadow: 0 0 50px #fff;
		letter-spacing: 80px;
		opacity: 0;
		-webkit-transform: rotateY(-90deg);
	}
	50% {
		text-shadow: 0 0 1px #fff;
		letter-spacing: 14px;
		opacity: 0.8;
		-webkit-transform: rotateY(0deg);
	}
	85% {
		text-shadow: 0 0 1px #fff;
		opacity: 0.8;
		-webkit-transform: rotateY(0deg) translateZ(100px);
	}
	100% {
		text-shadow: 0 0 10px #fff;
		opacity: 0;
		-webkit-transform: translateZ(130px);
		pointer-events: none;
	}
}

@-moz-keyframes Zia3OpeningSequence {
	0% {
		text-shadow: 0 0 50px #fff;
		letter-spacing: 80px;
		opacity: 0.2;
		-moz-transform: rotateY(-90deg);
	}
	50% {
		text-shadow: 0 0 1px #fff;
		letter-spacing: 14px;
		opacity: 0.8;
		-moz-transform: rotateY(0deg);
	}
	85% {
		text-shadow: 0 0 1px #fff;
		opacity: 0.8;
		-moz-transform: rotateY(0deg) translateZ(100px);
	}
	100% {
		text-shadow: 0 0 10px #fff;
		opacity: 0;
		-moz-transform: translateZ(130px);
		pointer-events: none;
	}
}

@keyframes Zia3OpeningSequence {
	0% {
		text-shadow: 0 0 50px #fff;
		letter-spacing: 80px;
		opacity: 0.2;
		transform: rotateY(-90deg);
	}
	50% {
		text-shadow: 0 0 1px #fff;
		letter-spacing: 14px;
		opacity: 0.8;
		transform: rotateY(0deg);
	}
	85% {
		text-shadow: 0 0 1px #fff;
		opacity: 0.8;
		transform: rotateY(0deg) translateZ(100px);
	}
	100% {
		text-shadow: 0 0 10px #fff;
		opacity: 0;
		transform: translateZ(130px);
		pointer-events: none;
	}
}

@-webkit-keyframes FadeIn {
	0% {
		opacity: 0;
		text-shadow: 0 0 50px #fff;
	}
	100% {
		opacity: 0.8;
		text-shadow: 0 0 1px #fff;
	}
}

@-moz-keyframes FadeIn {
	0% {
		opacity: 0;
		text-shadow: 0 0 50px #fff;
	}
	100% {
		opacity: 0.8;
		text-shadow: 0 0 1px #fff;
	}
}

@keyframes FadeIn {
	0% {
		opacity: 0;
		text-shadow: 0 0 50px #fff;
	}
	100% {
		opacity: 0.8;
		text-shadow: 0 0 1px #fff;
	}
}

/* Bold words */
.zia3-os-phrases h2:first-child .word3,
.zia3-os-phrases h2:nth-child(2) .word2,
.zia3-os-phrases h2:nth-child(4) .word2 {
	font-weight: 600;
}

/* Enter Here Link*/
#zia3_os_enter_here {
    font-family:'BebasNeueRegular', sans-serif;
    font-size: 24px;
    font-weight: normal;
    text-shadow: none;
    position: fixed;
    bottom: 20px;
    left: 10px;
    text-transform: none;
    width: 160px;
    text-align: center;
    padding: 10px;
    background: none repeat scroll 0% 0% rgba(8, 8, 8, 0.6);
    border: 1px solid #111;
    z-index: 99999;
    line-height: 20px;
}

#zia3_os_enter_here > p {
	margin-bottom: 0.2em;
}

#zia3_os_enter_here > a {
	margin-bottom: 0.2em;
}
