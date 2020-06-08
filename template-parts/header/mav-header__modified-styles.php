<?php
/**
 * @package mavericktheme
 */

echo '<style>';
    echo ':root {';

        // Site Width
        $mav_site__width = esc_attr( get_option( 'mav_setting_grid_system' ) );
        if ( ! empty( $mav_site__width ) ) {
            echo '--mav-site--width: '.$mav_site__width.'px;';
        }

        $mav_modified_colors = array(
            'mav_setting_color_primary'                             => '--mav-color--primary',
            'mav_setting_color_accent'                              => '--mav-color--accent',
            'mav_setting_color_site_header_background'              => '--mav-color__site__header--background',
            'mav_setting_color_site_footer_copyright_background'    => '--mav-color__site__footer__copyright--background'
        );

        /* Colors */
        foreach ( $mav_modified_colors as $option => $property ) {
            $saved_value = esc_attr( get_option( $option ) );
            if ( ! empty( $saved_value ) ) {
                printf('%1$s: %2$s;',$property, $saved_value);
            }
        }

        /* Fonts */
        $mav_modified_fonts = array(
            'mav_setting_font_primary'      => '--mav-font--primary',
            'mav_setting_font_secondary'    => '--mav-font--secondary',
            'mav_setting_font_tertiary'     => '--mav-font--tertiary',
            'mav_setting_font_monospace'    => '--mav-font--monospace',
            'mav_setting_font_condensed'    => '--mav-font--condensed'
        );

        foreach ( $mav_modified_fonts as $option => $property ) {
            $saved_value = esc_attr( get_option( $option ) );
            if ( ! empty( $saved_value ) ) {
                printf('%1$s: var(--mav-font__family--%2$s);',$property, $saved_value);
            }
        }

    echo '}';
echo '</style>';