<?php
/**
 * @package maverick-theme
 */

register_setting('mavog_theme_config' , 'mav_setting_blog_page_sidebar');
add_settings_field('mavid_theme_setting_blog_page_sidebar', 'Show Sidebar', 'mavf_theme_config_blog_page_sidebar', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_setting');

function mavf_theme_config_blog_page_sidebar() {
	$mavSavedValue = esc_attr( get_option('mav_setting_blog_page_sidebar') );
	$mavChecked = ( @$mavSavedValue == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="mavid-blog-page-sidebar" name="mav_setting_blog_page_sidebar" value="1" '.$mavChecked.'/></label>';
}