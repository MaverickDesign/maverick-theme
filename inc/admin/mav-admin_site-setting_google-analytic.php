<?php
/**
 * @package maverick-theme
 */

add_settings_section(
    'mavsec_site_setting_google_analytics',
    __('Google Analytics','maverick-theme'),
    'mavf_site_setting_google_analytics',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_google_analytics() {
    _e('Các thiết lập cho Google Analytics','maverick-theme');
}

register_setting( 'mavog_site_setting', 'mav_setting_enable_google_analytics' );
add_settings_field(
    'mavid_site_setting_enable_google_analytics',
    __('Kích hoạt Google Analytics','maverick-theme'),
    'mavf_site_setting_enable_google_analytics',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_analytics'
);

function mavf_site_setting_enable_google_analytics(){
    $mavSavedValue = esc_attr(get_option('mav_setting_enable_google_analytics'));
	$mavChecked = (@$mavSavedValue == 1 ? 'checked' : '');
	echo '<input type="checkbox" id="mavid-ss-enable-google-analytic" name="mav_setting_enable_google_analytics" value="1" '.$mavChecked.'/>';
}

register_setting( 'mavog_site_setting', 'mav_setting_google_analytics_id' );
add_settings_field(
    'mavid_site_setting_google_analytics_id',
    __('Google Analytics ID','maverick-theme'),
    'mavf_site_setting_google_analytics_id',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_analytics'
);

function mavf_site_setting_google_analytics_id() {
    $mavSavedValue = esc_attr( get_option('mav_setting_google_analytics_id') );
    printf('<input id="mavid-ss-google-analytic" type="text" name="mav_setting_google_analytics_id" value="%1$s" placeholder="%2$s"/>', $mavSavedValue,__('Google Analytics ID','maverick-theme'));
}