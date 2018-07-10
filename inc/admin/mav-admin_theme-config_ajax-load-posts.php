<?php
/**
 * @package maverick-theme
 */

// Load more post via Ajax
register_setting('mavog_theme_config' , 'mav_setting_ajax_load_posts');
add_settings_field('mavid_theme_setting_ajax_load_posts', 'Ajax loading Blog Page', 'mavf_theme_config_ajax_load_posts', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_setting');

function mavf_theme_config_ajax_load_posts() {
	$mavSavedValue = esc_attr( get_option('mav_setting_ajax_load_posts') );
	$mavChecked = ( @$mavSavedValue == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="mavid-ajax-load-posts" name="mav_setting_ajax_load_posts" value="1" '.$mavChecked.'/></label>';
}