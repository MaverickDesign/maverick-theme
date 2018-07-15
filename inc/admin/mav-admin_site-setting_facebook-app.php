<?php
/**
 * @package maverick-theme
 */

add_settings_section( 'mavsec_site_setting_facebook_app', 'Facebook App', 'mavf_site_setting_facebook_app', 'mav_admin_page_site_setting' );

function mavf_site_setting_facebook_app() {
    _e('Thiết lập cho Facebook App','maverick-theme');
}

register_setting('mavog_site_setting','mav_setting_enable_facebook_app');
add_settings_field(
    'mavid_site_setting_enable_facebook_app',
    __('Kích hoạt Facebook App','maverick-theme'),
    'mavf_site_setting_enable_facebook_app',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_facebook_app'
);

function mavf_site_setting_enable_facebook_app(){
    $mavSavedValue = esc_attr(get_option('mav_setting_enable_facebook_app'));
	$mavChecked = (@$mavSavedValue == 1 ? 'checked' : '');
	echo '<input type="checkbox" id="mavid-ss-enable-facebook-map" name="mav_setting_enable_facebook_app" value="1" '.$mavChecked.'/>';
}

register_setting( 'mavog_site_setting', 'mav_setting_facebook_app_id' );
add_settings_field(
    'mavid_site_setting_facebook_app_id',
    __('Facebook App ID','maverick-theme'),
    'mavf_site_setting_facebook_app_id',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_facebook_app'
);

function mavf_site_setting_facebook_app_id() {
    $mavSavedValue = esc_attr(get_option('mav_setting_facebook_app_id'));
    printf('
        <input id="mavid-ss-facebook-app" type="text" name="mav_setting_facebook_app_id" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue,__('Facebook App ID','maverick-theme')
    );
}