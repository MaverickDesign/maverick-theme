<?php
/**
 * @package maverick-theme
 */

register_setting('mavog_theme_config' , 'mav_setting_post_format');
add_settings_field( 'mavid_theme_config_theme_support_post_format', 'Post Formats', 'mavf_theme_config_theme_support_post_format', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

/**
 * Support Post Formats
 */
function mavf_theme_config_theme_support_post_format() {
	$mavSavedValue = get_option('mav_setting_post_format');
	$mavPostFormats = array('aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio' , 'chat');
	$mavOutput = '';
	foreach ($mavPostFormats as $mavPostFormat) {
		$mavChecked = ( @$mavSavedValue[$mavPostFormat] == 1 ? 'checked' : '');
		$mavOutput .= '<label><input type="checkbox" id="mavid-post-format-'.$mavPostFormat.'" name="mav_setting_post_format['.$mavPostFormat.']" value="1" '.$mavChecked.'/> '.ucfirst($mavPostFormat).'</label><br>';
	}
	echo $mavOutput;
}