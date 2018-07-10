<?php
/**
 * @package maverick-theme
 */

/**
 * Custom Post Types
 */

// Register setting
register_setting( 'mavog_theme_config', 'mav_setting_custom_post_type' );
add_settings_field( 'mavid_theme_config_theme_support_custom_post_type' , 'Custom Post Types', 'mavf_theme_config_theme_support_custom_post_type' , 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

// Callback function
function mavf_theme_config_theme_support_custom_post_type(){

	$mavSavedValue = get_option('mav_setting_custom_post_type');

	$mavCustomPostTypes = array (
		'testimonial',
		'subscriber',
		'portfolio',
		'member'
	);

	$mavOutput = '';

	foreach ($mavCustomPostTypes as $mavCustomPostType) {
		$mavChecked = ( @$mavSavedValue[$mavCustomPostType] == 1 ? 'checked' : '');
		$mavOutput .= '<label><input type="checkbox" id="mavid-custom-post-type-'.$mavCustomPostType.'" name="mav_setting_custom_post_type['.$mavCustomPostType.']" value="1" '.$mavChecked.'/> '.ucfirst($mavCustomPostType).'</label><br>';
	}

	echo $mavOutput;
}