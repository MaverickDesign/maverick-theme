<?php
/**
 * @package maverick-theme
 */

register_setting('mavog_theme_config' , 'mav_setting_blog_page_columns');
add_settings_field('mavid_theme_setting_blog_page_columns', 'Columns', 'mavf_theme_config_blog_page_columns', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_setting');

function mavf_theme_config_blog_page_columns() {
	$mavSavedValue = esc_attr( get_option('mav_setting_blog_page_columns') );
	printf( '<input type="text" name="mav_setting_blog_page_columns" value="%s" placeholder="from 1 to 4"/>', $mavSavedValue );
	printf('<span class="mav-admin-desc">%1$s</span>',__('Choose columns layout on Blog page (from 1 to 4)','maverick-theme'));
}