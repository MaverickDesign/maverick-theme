<?php
/**
 * @package mavericktheme
 */

function mavf_enqueue_styles() {

    // Roboto Mono
    // wp_enqueue_style(
    //     'mavcss-roboto-mono',
    //     'https://fonts.googleapis.com/css?family=Roboto+Mono:100,300,400,500,700&amp;subset=vietnamese',
    //     array(),
    //     '1.0.0',
    //     'all'
    // );

    // wp_enqueue_style(
    //     'mavcss-bai-jamjuree',
    //     'https://fonts.googleapis.com/css?family=Bai+Jamjuree:300,300i,400,400i,500,500i,700,700i&subset=vietnamese',
    //     array(),
    //     '1.0.0',
    //     'all'
    // );

    // wp_enqueue_style(
    //     'mavcss-ibm-plex-sans',
    //     'https://fonts.googleapis.com/css?family=IBM+Plex+Sans:100,100i,300,300i,400,400i,500,500i,700,700i&amp;subset=vietnamese',
    //     array(),
    //     '1.0.0',
    //     'all'
    // );

    // wp_enqueue_style(
    //     'mavcss-ibm-plex-serif',
    //     'https://fonts.googleapis.com/css?family=IBM+Plex+Serif:100,100i,300,300i,400,400i,500,500i,700,700i&amp;subset=vietnamese',
    //     array(),
    //     '1.0.0',
    //     'all'
    // );

    // wp_enqueue_style(
    //     'mavcss-montserrat',
    //     'https://fonts.googleapis.com/css?family=Montserrat:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=vietnamese',
    //     array(),
    //     '1.0.0',
    //     'all'
    // );

    // wp_enqueue_style(
    //     'mavcss-exo',
    //     'https://fonts.googleapis.com/css?family=Exo:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=vietnamese',
    //     array(),
    //     '1.0.0',
    //     'all'
    // );

    // Web Font Font Awesome
    // CDN
    // wp_enqueue_style('mavcss-font-awesome', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css', array() , '5.0.9' , 'all');

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

function mavf_enqueue_fonts() {

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

function mavf_enqueue_font( $mav_font ) {

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