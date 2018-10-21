<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec__theme_styles__theme_fonts',
    __( 'Thiết lập Font', 'mavericktheme' ),
    'mavf__theme_styles__theme_fonts',
    'mav_admin__setting_section__theme_styles'
);

function mavf__theme_styles__theme_fonts() {
    printf( '<p>%1$s</p>', __( 'Thiết lập Font cho website', 'mavericktheme' ) );
}

// Primary Font
register_setting(
    'mavog_theme_styles',
    'mav_setting_font_primary'
);

add_settings_field(
    'mavid_theme_styles_font_primary',
    __( 'Font chính', 'mavericktheme' ),
    'mavf_theme_styles_font_primary',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_fonts'
);

function mavf_theme_styles_font_primary() {
    mavf_theme_style_input_font_select('primary');
}

// Secondary Font
register_setting(
    'mavog_theme_styles',
    'mav_setting_font_secondary'
);

add_settings_field(
    'mavid_theme_styles_font_secondary',
    __( 'Font phụ', 'mavericktheme' ),
    'mavf_theme_styles_font_secondary',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_fonts'
);

function mavf_theme_styles_font_secondary() {
    mavf_theme_style_input_font_select('secondary');
}

// Tertiary Font
register_setting(
    'mavog_theme_styles',
    'mav_setting_font_tertiary'
);

add_settings_field(
    'mavid_theme_styles_font_tertiary',
    __( 'Font thứ ba', 'mavericktheme' ),
    'mavf_theme_styles_font_tertiary',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_fonts'
);

function mavf_theme_styles_font_tertiary() {
    mavf_theme_style_input_font_select('tertiary');
}

// Font Monospace
register_setting(
    'mavog_theme_styles',
    'mav_setting_font_monospace'
);

add_settings_field(
    'mavid_theme_styles_font_monospace',
    __( 'Font Monospace', 'mavericktheme' ),
    'mavf_theme_styles_font_monospace',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_fonts'
);

function mavf_theme_styles_font_monospace() {
    mavf_theme_style_input_font_select('monospace');
}

// Font Condensed
register_setting(
    'mavog_theme_styles',
    'mav_setting_font_condensed'
);

add_settings_field(
    'mavid_theme_styles_font_condensed',
    __( 'Font Condensed', 'mavericktheme' ),
    'mavf_theme_styles_font_condensed',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_fonts'
);

function mavf_theme_styles_font_condensed() {
    mavf_theme_style_input_font_select('condensed');
}

// Output font select dropdown list
function mavf_theme_style_input_font_select( $mav_value ) {

    $mav_saved_value = esc_attr( get_option( "mav_setting_font_$mav_value" ) );
    printf(
        '<select name="mav_setting_font_%3$s" value="%1$s"/>',
        $mav_saved_value, __( '', 'mavericktheme' ), $mav_value
    );
        // Output options
        mavf_theme_styles_font_options( $mav_saved_value );
    echo '</select>';

    if ( ! empty( mavf_get_font_list( $mav_saved_value )["weights"] ) ) {
        $mav_weights = mavf_get_font_list( $mav_saved_value )["weights"];
        printf('Available weights: ');
        foreach ( $mav_weights as $mav_weight ) {
            echo $mav_weight.' ';
        }
    }
}

// Get font list from json file
function mavf_get_font_list( $mav_font = '' ) {

    $mav_font_list = TEMPLATE_DIR . '/inc/admin/mav_admin__font_list.json';

    if ( file_exists( $mav_font_list ) ) {
        $mav_fonts = json_decode( file_get_contents( $mav_font_list ), true );
    } else {
        return;
    }

    if ( ! empty( $mav_font ) ) {
        return $mav_fonts[$mav_font];
    } else {
        return $mav_fonts;
    }

}

// Output font list options
function mavf_theme_styles_font_options( $mav_value ) {

    $mav_fonts = mavf_get_font_list();

    foreach ( $mav_fonts as $mav_font ) {
        $mav_checked = ( $mav_font["value"] == $mav_value ) ? 'selected' : '';
        printf('<option value="%1$s" %3$s>%2$s</option>', $mav_font["value"], $mav_font["name"], $mav_checked);
    }
}
