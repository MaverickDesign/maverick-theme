<?php
/**
 * @package mavericktheme
 */

echo '<style>';
    echo ':root {';

        // Site Width
        $mav_site__width = esc_attr( get_option( 'mav_setting_grid_system' ) );
        if ( ! empty( $mav_site__width ) ) {
            // echo '--mav-site-width: '.$mav_site__width.'px;';
            echo '--mav-site--width: '.$mav_site__width.'px;';
        }

        // Primary Color
        $mav_color__primary = esc_attr( get_option( 'mav_setting_color_primary' ) );
        if ( ! empty( $mav_color__primary ) ) {
            // echo "--mav-color-primary: $mav_color__primary;";
            echo "--mav-color--primary: $mav_color__primary;";
        }

        // Accent Color
        $mav_color__accent = esc_attr( get_option( 'mav_setting_color_accent' ) );
        if ( ! empty( $mav_color__accent ) ) {
            // echo "--mav-color-accent: $mav_color__accent;";
            echo "--mav-color--accent: $mav_color__accent;";
        }

        // Site Header Background Color
        $mav_color_site_header_background = esc_attr( get_option( 'mav_setting_color_site_header_background' ) );
        if ( ! empty( $mav_color_site_header_background ) ) {
            echo "--mav-color__site__header--background: $mav_color_site_header_background;";
        }

    echo '}';
echo '</style>';
?>