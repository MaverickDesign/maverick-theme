<?php
/**
 * @package mavericktheme
 */

function mavf_enqueue_styles() {

    /**
     * Local Web Fonts
     */

    //  Font Awesome 5 Free
    wp_enqueue_style(
        'mavcss-font-awesome',
        TEMPLATE_URI.'/css/fontawesome-all.css',
        array(),
        '5.0.13',
        'all'
    );

    // Enqueue Web Fonts
    mavf_enqueue_fonts();

    // Main Maverick Theme CSS
    wp_enqueue_style(
        'mavcss-mavericktheme-styles',
        TEMPLATE_URI.'/css/maverick-styles.css',
        array(),
        '',
        'all'
    );
}
add_action( 'wp_enqueue_scripts', 'mavf_enqueue_styles' );

function mavf_enqueue_fonts()
{
    $mav_font_primary = esc_attr( get_option( 'mav_setting_font_primary' ) );
    if ( empty( $mav_font_primary ) ) $mav_font_primary = 'roboto';

    $mav_font_secondary = esc_attr( get_option( 'mav_setting_font_secondary' ) );
    if ( empty( $mav_font_secondary ) ) $mav_font_secondary = 'roboto_cond';

    $mav_font_tertiary = esc_attr( get_option( 'mav_setting_font_tertiary' ) );
    if ( empty( $mav_font_tertiary ) ) $mav_font_tertiary = 'roboto_mono';

    $mav_fonts = array(
        $mav_font_primary,
        $mav_font_secondary,
        $mav_font_tertiary
    );

    foreach ( $mav_fonts as $mav_font ) {
        mavf_enqueue_font( $mav_font );
    }
}

function mavf_enqueue_font( $mav_font )
{
    $mav_font_list = TEMPLATE_DIR . '/inc/admin/mav_admin__font_list.json';

    if ( file_exists( $mav_font_list ) ) {
        $mav_fonts = json_decode( file_get_contents( $mav_font_list ), true );
    } else {
        return;
    }

    $mav_font_item = $mav_fonts[$mav_font];

    wp_enqueue_style(
        $mav_font_item["id"],
        $mav_font_item["url"],
        array(),
        '1.0.0',
        'all'
    );
}