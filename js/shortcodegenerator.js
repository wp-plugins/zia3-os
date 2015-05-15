jQuery("#zia3_os_shortcodeg_button").click(function() {
	jQuery("#zia3_os_example_shortcode").toggle("slow", function() {
	});
	jQuery("#zia3_os_shortcode_generator").toggle("slow", function() {
	});
	var e = jQuery("#zia3_os_shortcodeg_button").val();
	if (e === "Generate Your Own Shortcode") {
		jQuery("#zia3_os_shortcodeg_button").val("View Old Shortcode")
	}
	if (e === "Generate a New Shortcode") {
		jQuery("#zia3_os_shortcodeg_button").val("View Old Shortcode")
	}
	if (e === "View Old Shortcode") {
		jQuery("#zia3_os_shortcodeg_button").val("Generate a New Shortcode")
	}
});
jQuery("#zia3_os_generate_button").click(function() {
	jQuery("#zia3_os_generated_shortcode_container").slideDown("slow", function() {
	});
	var e = "id=\"" + jQuery("#id").val() + "\"";
	var z = " link_title=\"" + jQuery("#link_title").val() + "\"";
	var w = jQuery("#link_title").val();
	var x = " link=\"" + jQuery("#link").val() + "\"";
	var y = jQuery("#link").val();
	var lc = " link_color=\"" + jQuery("#link_color").val() + "\"";
	var lz = jQuery("#link_color").val();
	var c = " slogan=\"" + jQuery("#slogan").val() + "\"";
	var d = jQuery("#slogan").val();
	var f = " slogan_link=\"" + jQuery("#slogan_link").val() + "\"";
	var g = jQuery("#slogan_link").val();
	var sc = " slogan_link_color=\"" + jQuery("#slogan_link_color").val() + "\"";
	var sz = jQuery("#slogan_link_color").val();
	var fs = " font_size=\"" + jQuery("#font_size").val() + "\"";
	var fz = jQuery("#font_size").val();
	
	if (!w) {
		z = " link_title=\"Enter Here\""
	}
	if (!y) {
		x = " link=\"http://zia3.com\""
	}
	if (!d) {
		c = " slogan=\"Just Do It\""
	}
	if (!g) {
		f = " slogan_link=\"http://zia3.com\""
	}
	if (!lz) {
		lc = " link_color=\"255,255,255\"";
	}
	if (!sz) {
		sc = " slogan_link_color=\"255,153,204\"";
	}
	if (!fz) {
		fs = " font_size=\"30\"";
	}
	
	var t = "[zia3_os " + e +  z + x + c + f + lc + sc + fs + "]";
	jQuery("#zia3_os_generated_shortcode").val(t)
});
jQuery("#zia3_os_help_button").click(function() {
	jQuery("#zia3_os_shortcode_generator").toggle("slow", function() {
	});
	jQuery("#zia3_os_shortcodeg_button").prop("disabled", true);
	jQuery("#zia3_os_parameter_explaination").toggle("slow", function() {
	})
});
jQuery("#zia3_os_help_back_button").click(function() {
	jQuery("#zia3_os_shortcode_generator").toggle("slow", function() {
	});
	jQuery("#zia3_os_shortcodeg_button").prop("disabled", false);
	jQuery("#zia3_os_parameter_explaination").toggle("slow", function() {
	})
})