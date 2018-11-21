<?php
/**
 * @package mavericktheme
 */

function mavf_google_map( $mav_args )
{

    $mavGoogleMap       = isset($mav_args['source'])     ? esc_html($mav_args['source'])  : esc_html(get_option('mav_setting_google_map_uri'));
    $mav_google_map_height = isset($mav_args['height'])     ? $mav_args['height']            : esc_attr(get_option('mav_setting_google_map_height'));
    $mavMapId           = isset($mav_args['id'])         ? 'mavid-'.$mav_args['id']       : '';
    $mavWrapperClass    = isset($mav_args['wrapper'])    ? $mav_args['wrapper']           : 'mav-google-map-wrapper';
    $mavContainerClass  = isset($mav_args['container'])  ? $mav_args['container']         : 'mav-google-map-ctn';

    if ( empty( $mav_google_map_height ) ) {
        $mav_google_map_height = '30vh';
    }

    if ( ! empty( $mavGoogleMap ) ) {
        printf('<div %1$s class="%2$s">', $mavMapId, $mavWrapperClass);
            printf(
                '<div class="%1$s" style="height: %2$s">',
                $mavContainerClass, $mav_google_map_height
            );
                printf(
                    '<iframe src="%1$s" width="100%%" height="100%%" frameborder="0" style="border:0" allowfullscreen></iframe>',
                    $mavGoogleMap
                );
            echo '</div>';
        echo '</div>';
    }
}