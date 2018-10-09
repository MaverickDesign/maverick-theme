<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_site_setting_facebook_app',
    'Facebook App',
    'mavf_site_setting_facebook_app',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_facebook_app()
{
    _e( 'Thiết lập cho Facebook App', 'mavericktheme' );
}

// Enable Facebook App
register_setting(
    'mavog_site_setting',
    'mav_setting_enable_facebook_app'
);

add_settings_field(
    'mavid_site_setting_enable_facebook_app',
    __( 'Kích hoạt Facebook App', 'mavericktheme' ),
    'mavf_site_setting_enable_facebook_app',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_facebook_app'
);

function mavf_site_setting_enable_facebook_app()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_enable_facebook_app' ) );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    echo '<input type="checkbox" id="mavid-ss-enable-facebook-app" name="mav_setting_enable_facebook_app" value="1" '.$mavChecked.'/>';
}

// Facebook App ID
register_setting(
    'mavog_site_setting',
    'mav_setting_facebook_app_id'
);

add_settings_field(
    'mavid_site_setting_facebook_app_id',
    __( 'Facebook App ID', 'mavericktheme' ),
    'mavf_site_setting_facebook_app_id',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_facebook_app'
);

function mavf_site_setting_facebook_app_id()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_facebook_app_id' ) );
    printf(
        '<input id="mavid-ss-facebook-app" type="text" name="mav_setting_facebook_app_id" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'Facebook App ID', 'mavericktheme' )
    );
}

// Enable Facebook Share Button
register_setting(
    'mavog_site_setting',
    'mav_setting_enable_facebook_share_button'
);

add_settings_field(
    'mavid_site_setting_enable_facebook_share_button',
    __( 'Facebook Share Button', 'mavericktheme' ),
    'mavf_site_setting_enable_facebook_share_button',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_facebook_app'
);

function mavf_site_setting_enable_facebook_share_button()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_enable_facebook_share_button' ) );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    echo '<input type="checkbox" id="mavid-ss-enable-facebook-share-button" name="mav_setting_enable_facebook_share_button" value="1" '.$mavChecked.'/>';
}

// Enable Facebook Comment Plugin
register_setting(
    'mavog_site_setting',
    'mav_setting_facebook_comment'
);

add_settings_field(
    'mavid_site_setting_facebook_comment',
    __( 'Facebook Comment Plugin', 'mavericktheme' ),
    'mavf_site_setting_facebook_comment',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_facebook_app'
);

function mavf_site_setting_facebook_comment()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_facebook_comment' ) );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    echo '<input type="checkbox" id="mavid-ss-enable-facebook-comment" name="mav_setting_facebook_comment" value="1" '.$mavChecked.'/>';
}