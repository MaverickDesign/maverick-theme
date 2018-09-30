<?php
/**
 * @package mavericktheme
 */

// Setting Section
add_settings_section(
    'mavsec_theme_config_dev_mode',
    __('Chế độ Website đang phát triển', 'mavericktheme'),
    'mavf_theme_config_sec_dev_mode',
    'mav_admin_page_theme_info'
);

function mavf_theme_config_sec_dev_mode()
{
    _e( 'Kích hoạt chế độ đang phát triển website', 'mavericktheme' );
}

// Setting Field
register_setting('mavog_theme_config', 'mav_setting_dev_mode');
add_settings_field(
    'mavid_theme_config_dev_mode',
    __('Chế độ phát đang triển website', 'mavericktheme'),
    'mavf_theme_config_dev_mode',
    'mav_admin_page_theme_info',
    'mavsec_theme_config_dev_mode',
    array(
        'label_for' => 'mavid-setting-dev-mode'
    )
);

function mavf_theme_config_dev_mode()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_dev_mode' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<input id="mavid-setting-dev-mode" type="checkbox" name="mav_setting_dev_mode" value="1" %1$s/>',
        $mav_checked
    );
}