<?php
/**
 * @package maverick-theme
 */

// Setting Section
add_settings_section(
    'mavsec_theme_config_dev_mode',
    __('Developing Mode','maverick-theme'),
    'mavf_theme_config_sec_dev_mode',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_sec_dev_mode(){
   _e( 'Kích hoạt chế độ đang phát triển website' , 'maverick-theme' );
}

// Setting Field
register_setting('mavog_theme_config' , 'mav_setting_dev_mode');

add_settings_field(
	'mavid_theme_config_dev_mode',
	__('Dev Mode','maverick-theme'),
	'mavf_theme_config_dev_mode',
	'mav_admin_page_theme_config',
	'mavsec_theme_config_dev_mode'
);

function mavf_theme_config_dev_mode() {
	$mavSavedValue = esc_attr( get_option( 'mav_setting_dev_mode' ) );
	$mavChecked = ( @$mavSavedValue == 1 ? 'checked' : '');
	printf( '<input id="mavid-setting-dev-mode" type="checkbox" name="mav_setting_dev_mode" value="1" %1$s/>' , $mavChecked );
}