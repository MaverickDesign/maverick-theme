<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_site_setting_google_services',
    __( 'Google Services', 'mavericktheme' ),
    'mavf_site_setting_google_analytics',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_google_analytics()
{
    _e( '<p>Thiết lập cho các dịch vụ của Google</p>', 'mavericktheme' );
}

/**
 * Google Analytics
 */

// Enable Google Analytics
register_setting(
    'mavog_site_setting',
    'mav_setting_enable_google_analytics'
);
add_settings_field(
    'mavid_site_setting_enable_google_analytics',
    __( 'Kích hoạt Google Analytics', 'mavericktheme' ),
    'mavf_site_setting_enable_google_analytics',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_services'
);

function mavf_site_setting_enable_google_analytics()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_enable_google_analytics' ) );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    echo '<input type="checkbox" id="mavid-ss-enable-google-analytic" name="mav_setting_enable_google_analytics" value="1" '.$mavChecked.'/>';
}

// Google Analytics ID
register_setting(
    'mavog_site_setting',
    'mav_setting_google_analytics_id'
);
add_settings_field(
    'mavid_site_setting_google_analytics_id',
    __( 'Google Analytics ID', 'mavericktheme' ),
    'mavf_site_setting_google_analytics_id',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_services'
);

function mavf_site_setting_google_analytics_id()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_google_analytics_id'));
    printf(
        '<input id="mavid-ss-google-analytic" type="text" name="mav_setting_google_analytics_id" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'Google Analytics ID', 'mavericktheme' )
    );
}

/**
 * Google Tage Manager
 */

// Enable Google Tag Manager
register_setting(
    'mavog_site_setting',
    'mav_setting_enable_google_tag_manager'
);
add_settings_field(
    'mavid_site_setting_enable_google_tag_manager',
    __( 'Kích hoạt Google Tag Manager', 'mavericktheme' ),
    'mavf_site_setting_enable_google_tag_manager',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_services'
);

function mavf_site_setting_enable_google_tag_manager()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_enable_google_tag_manager' ) );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    echo '<input type="checkbox" id="mavid-ss-enable-google-tag-manager" name="mav_setting_enable_google_tag_manager" value="1" '.$mavChecked.'/>';
}

// Google Tag Manager ID
register_setting(
    'mavog_site_setting',
    'mav_setting_google_tag_manager_id'
);
add_settings_field(
    'mavid_site_setting_google_tag_manager_id',
    __( 'Google Tag Manager ID', 'mavericktheme' ),
    'mavf_site_setting_google_tag_manager_id',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_services'
);

function mavf_site_setting_google_tag_manager_id()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_google_tag_manager_id'));
    printf(
        '<input id="mavid-ss-google-analytic" type="text" name="mav_setting_google_tag_manager_id" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'Google Tag Manager ID', 'mavericktheme' )
    );
}

/**
 * Google AdSense
 */

// Enable Google AdSense
register_setting(
    'mavog_site_setting',
    'mav_setting_enable_google_adsense'
);
add_settings_field(
    'mavid_site_setting_enable_google_adsense',
    __( 'Kích hoạt Google AdSense', 'mavericktheme' ),
    'mavf_site_setting_enable_google_adsense',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_services'
);

function mavf_site_setting_enable_google_adsense()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_enable_google_adsense' ) );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    echo '<input type="checkbox" id="mavid-ss-enable-google-adsense" name="mav_setting_enable_google_adsense" value="1" '.$mavChecked.'/>';
}

// Google AdSense ID
register_setting(
    'mavog_site_setting',
    'mav_setting_google_adsense_id'
);
add_settings_field(
    'mavid_site_setting_google_adsense_id',
    __( 'Google AdSense ID', 'mavericktheme' ),
    'mavf_site_setting_google_adsense_id',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_google_services'
);

function mavf_site_setting_google_adsense_id()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_google_adsense_id' ) );
    printf(
        '<input id="mavid-ss-google-adsense" type="text" name="mav_setting_google_adsense_id" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'Google AdSense ID', 'mavericktheme' )
    );
}