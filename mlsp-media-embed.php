<?php
/*
Plugin Name: MLSP Media Embed
Plugin URI: http://myleadsystempro.com/
Description: Enables functionality for embedding media from MyLeadSystemPRO.com. Also allows you to activate a script that will allow all media embeds to resize dynamically (VERY useful for responsive themes!).
Version: 1.0
License: GPLv2
Author: Jeff Hoffman & Jim Fanale
Author URI: http://mlmblogmastery.co/
*/

 //
 // ------------------------------------------------------------------
 // THE FOLLOWING WILL ADD THE OPTION TO ACTIVATE RESPONSIVE MEDIA
 // ------------------------------------------------------------------
 //
 
 function responsive_functionality_init() {
 	// Add the section to media settings so we can add our
 	add_settings_section('responsive_functionality_section',
		'<p>&nbsp;</p>Add Responsive Media Functionality',
		'responsive_functionality_section_callback_function',
		'media');
 	
 	// Add the field 
 	add_settings_field('responsive_functionality_name',
		'Add Responsive Media Functionality',
		'responsive_functionality_callback_function',
		'media',
		'responsive_functionality_section');
 	
 	// Register our setting
 	register_setting('media','responsive_functionality_name');
 }
 
 add_action('admin_init', 'responsive_functionality_init');
 
  
 // ------------------------------------------------------------------
 // Settings section callback function
 // ------------------------------------------------------------------
 // This function is needed if we added a new section. 
 //
 
 function responsive_functionality_section_callback_function() {
 	echo '<p>This will activate a script that will resize your media on the fly based the the user\'s browser size.<br />
This script will dynamically calculate the height and width of your embedded media, and the resize it accordingly.<br /> 
Again, this is an OPTIONAL addition, but it can be extremely helpful for those with responsive themes.
</p>';
 }
 
 // ------------------------------------------------------------------
 // Callback function for our example setting
 // ------------------------------------------------------------------
 // creates a checkbox true/false option. Other types are surely possible
 //
 
 function responsive_functionality_callback_function() {
 	echo '<input name="responsive_functionality_name" id="responsive_functionality" type="checkbox" value="1" class="code" ' . checked( 1, get_option('responsive_functionality_name'), false ) . ' /> Activate';
 }

// MAKE THE MAGIC HAPPEN
if (get_option('responsive_functionality_name')) {
add_filter('embed_oembed_html', 'mlmb_video_wrapper', 10, 3);

if (!function_exists('mlmb_video_wrapper')):
function mlmb_video_wrapper($html, $url, $attr) {
	// GET HEIGHT AND WIDTH OF EMBED
	$height = preg_match('/height=\"([0-9]*)\"/', $html, $matches) ? $matches[1] : 0;
	$width = preg_match('/width=\"([0-9]*)\"/', $html, $matches) ? $matches[1] : 0;
	// DO THE MATH TO GET THE CORRECT PADDING AMOUNT
	$padding = '';
	if ($height > 0) {
		$padding = ' style="padding-bottom:' . round(($height / $width) * 100, 2) . '%;"';
	}
	// RETURN WRAPPING DIV WITH CORRECT PADDING AMOUNT
	return '<div class="embed-container"' . $padding . '>' . $html . '</div><!-- /.embed-container -->';
}
endif;

// add necessary styles for responsive functionality
add_action('wp_head', 'build_embed_stylesheet');
function build_embed_stylesheet() { ?>
<style>
video {
	max-width: 100%;
	height: auto;
}
.embed-container {
	position: relative;
 /* padding-top: 30px; */
	margin: 0 0px 30px;
	height: 0;
	overflow: hidden;
}
.embed-container iframe,   .embed-container object,   .embed-container embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100% !important;
}
.embed-container iframe,   .embed-container object,   .embed-container embed {
	height: 100% !important;
}
</style>
<?php }
}
// ADD MLSP oEMBED
function add_mlsp_oembed() {
	wp_oembed_add_provider( 'http://www.mlsp.com/media/*/*', 'http://www.mlmleadsystempro.com/media/oembed' );
}
add_action('init','add_mlsp_oembed');
?>
