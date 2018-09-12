<?php
/**
 * @package mavericktheme
 */

/**
 * Section: Theme Colors
 */
add_settings_section(
    'mavsec_theme_styles_theme_colors',
    __( 'Thiết lập màu sắc', 'mavericktheme' ),
    'mavf_theme_styles_theme_colors',
    'mav_admin_page_theme_styles'
);

function mavf_theme_styles_theme_colors() {
    _e( 'Thiết lập màu sắc cho website', 'mavericktheme' );
}

// Primary Color
register_setting(
    'mavog_theme_styles', 'mav_setting_color_primary'
);

add_settings_field(
    'mavid_theme_styles_color_primary',
    __( 'Màu chính', 'mavericktheme' ),
    'mavf_theme_styles_color_primary',
    'mav_admin_page_theme_styles',
    'mavsec_theme_styles_theme_colors'
);

function mavf_theme_styles_color_primary()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_primary' ) );
    printf(
        '<input type="text" name="mav_setting_color_primary" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Nhập theo định dạng HEX', 'mavericktheme' )
    );
    if ( ! empty( $mav_saved_value ) ) {
        printf(
            '<div class="mav-admin-color-preview-box" style="background:%1$s;"></div>',
            $mav_saved_value
        );
    }
}

// Accent Color
register_setting(
    'mavog_theme_styles', 'mav_setting_color_accent'
);

add_settings_field(
    'mavid_theme_styles_color_accent',
    __( 'Màu phụ', 'mavericktheme' ),
    'mavf_theme_styles_color_accent',
    'mav_admin_page_theme_styles',
    'mavsec_theme_styles_theme_colors'
);

function mavf_theme_styles_color_accent()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_accent' ) );
    printf(
        '<input type="text" name="mav_setting_color_accent" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Nhập theo định dạng HEX', 'mavericktheme' )
    );
    if ( ! empty( $mav_saved_value ) ) {
        printf(
            '<div class="mav-admin-color-preview-box" style="background:%1$s;"></div>',
            $mav_saved_value
        );
    }
}
