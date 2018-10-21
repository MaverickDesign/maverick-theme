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

        // Primary Font
        $mav_font_primary = esc_attr( get_option( 'mav_setting_font_primary' ) );
        if ( ! empty( $mav_font_primary ) ) {
            echo "--mav-font--primary : var(--mav-font__family--$mav_font_primary);";
        }

        // Secondary Font
        $mav_font_secondary = esc_attr( get_option( 'mav_setting_font_secondary' ) );
        if ( ! empty( $mav_font_secondary ) ) {
            echo "--mav-font--secondary : var(--mav-font__family--$mav_font_secondary);";
        }

        // Tertiary Font
        $mav_font_tertiary = esc_attr( get_option( 'mav_setting_font_tertiary' ) );
        if ( ! empty( $mav_font_tertiary ) ) {
            echo "--mav-font--tertiary : var(--mav-font__family--$mav_font_tertiary);";
        }

        // Monospace Font
        $mav_font_monospace = esc_attr( get_option( 'mav_setting_font_monospace' ) );
        if ( ! empty( $mav_font_monospace ) ) {
            echo "--mav-font--monospace : var(--mav-font__family--$mav_font_monospace);";
        }

        // Condensed Font
        $mav_font_condensed = esc_attr( get_option( 'mav_setting_font_condensed' ) );
        if ( ! empty( $mav_font_condensed ) ) {
            echo "--mav-font--condensed : var(--mav-font__family--$mav_font_condensed);";
        }

    echo '}';
echo '</style>';
?>