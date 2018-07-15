<?php
/**
 * @package maverick-theme
 */

add_settings_section( 'mavsec_site_setting_google_map', 'Google Map', 'mavf_site_setting_google_map', 'mav_admin_page_site_setting' );

function mavf_site_setting_google_map() {
    _e('Các thiết lập cho Google Map','maverick-theme');
}

register_setting( 'mavog_site_setting', 'mav_setting_enable_google_map' );
add_settings_field(
    'mavid_site_setting_enable_google_map',
    __('Kích hoạt Google Map','maverick-theme'),
    'mavf_site_setting_enable_google_map',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_map'
);

function mavf_site_setting_enable_google_map(){
    $mavSavedValue = esc_attr(get_option('mav_setting_enable_google_map'));
	$mavChecked = (@$mavSavedValue == 1 ? 'checked' : '');
	echo '<input type="checkbox" id="mavid-ss-enable-google-map" name="mav_setting_enable_google_map" value="1" '.$mavChecked.'/>';
}

register_setting( 'mavog_site_setting', 'mav_setting_google_map_uri' );
add_settings_field(
    'mavid_site_setting_google_map_uri',
    __('Google Map URI','maverick-theme'),
    'mavf_site_setting_google_map_uri',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_map'
);

function mavf_site_setting_google_map_uri() {
    $mavSavedValue = esc_attr( get_option('mav_setting_google_map_uri') );
    printf( '<input type="text" name="mav_setting_google_map_uri" value="%1$s" placeholder="Google Map URI"/>', $mavSavedValue );
}

register_setting( 'mavog_site_setting', 'mav_setting_google_map_height' );
add_settings_field(
    'mavid_site_setting_google_map_height',
    __('Chiều cao màn hình','maverick-theme'),
    'mavf_site_setting_google_map_height',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_map'
);

function mavf_site_setting_google_map_height() {
    $mavSavedValue = esc_attr( get_option('mav_setting_google_map_height') );
    printf('<input type="text" name="mav_setting_google_map_height" value="%1$s" placeholder="%2$s"/>', $mavSavedValue, __('Chiều cao bản đồ theo tỉ lệ % chiều ngang màn hình (vw)','maverick-theme'));
}