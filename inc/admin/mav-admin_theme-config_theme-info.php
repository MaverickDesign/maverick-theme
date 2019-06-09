<?php
/**
 * @package mavericktheme
 */

// Setting Section
add_settings_section(
    'mavsec_theme_config_theme_info',
    __( 'Thông tin bộ giao diện', 'mavericktheme' ),
    'mavf_theme_info_display_theme_info',
    'mav_admin_page_theme_info'
);

function mavf_theme_info_display_theme_info()
{
    _e( 'Thông tin bộ giao diện', 'mavericktheme' );
}

register_setting(
    'mavog_theme_info',
    'mav_setting_theme_info'
);

add_settings_field(
    'mavid_theme_info_display_theme_info',
    __( 'Không hiển thị ở chân trang', 'mavericktheme' ),
    'mavf_theme_info_display_footer_theme_info',
    'mav_admin_page_theme_info',
    'mavsec_theme_config_theme_info',
    array(
        'label_for' => 'mavid-setting-theme-info'
    )
);

function mavf_theme_info_display_footer_theme_info()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_theme_info' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<input id="mavid-setting-theme-info" type="checkbox" name="mav_setting_theme_info" value="1" %1$s/>',
        $mav_checked
    );
}
