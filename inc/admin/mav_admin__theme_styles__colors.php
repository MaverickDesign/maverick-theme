<?php
/**
 * @package mavericktheme
 */

// Vendor Functions
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

/**
 * Section: Theme Colors
 */
add_settings_section(
    'mavsec__theme_styles__theme_colors',
    __( 'Thiết lập màu sắc', 'mavericktheme' ),
    'mavf__theme_styles__theme_colors',
    'mav_admin__setting_section__theme_styles'
);

function mavf__theme_styles__theme_colors() {
    printf( '<p>%1$s</p>', __( 'Thiết lập màu sắc cho website', 'mavericktheme' ) );
}

// Primary Color
register_setting(
    'mavog_theme_styles', 'mav_setting_color_primary'
);

add_settings_field(
    'mavid_theme_styles_color_primary',
    __( 'Màu chính', 'mavericktheme' ),
    'mavf_theme_styles_color_primary',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_primary()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_primary' ) );
    printf(
        '<input type="text" name="mav_setting_color_primary" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

// Accent Color
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_accent'
);

add_settings_field(
    'mavid_theme_styles_color_accent',
    __( 'Màu phụ', 'mavericktheme' ),
    'mavf_theme_styles_color_accent',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_accent()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_accent' ) );
    printf(
        '<input type="text" name="mav_setting_color_accent" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

// Site header color
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_site_header_background'
);

add_settings_field(
    'mavid_theme_styles_color_site_header_background',
    __( 'Site Header Background', 'mavericktheme' ),
    'mavf_theme_styles_color_site_header_background',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_site_header_background()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_site_header_background' ) );
    printf(
        '<input type="text" name="mav_setting_color_site_header_background" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

// Color preview box
function mavf_color_preview_box( $mav_saved_value ) {
    if ( ! empty( $mav_saved_value ) ) {
        printf(
            '<div class="mav-admin-color-preview-box" style="background:%1$s;"></div>',
            $mav_saved_value
        );
    }
}