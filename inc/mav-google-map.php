<?php
/*
 * @package mavericktheme
 */
function mavf_google_map($mavArgs) {

    $mavGoogleMap       = isset($mavArgs['source'])     ? esc_html($mavArgs['source'])  : esc_html(get_option('mav_setting_goole_map_uri'));
    $mavGoogleMapHeight = isset($mavArgs['height'])     ? $mavArgs['height']            : esc_html(get_option('mav_setting_goole_map_height'));
    $mavMapId           = isset($mavArgs['id'])         ? 'mavid-'.$mavArgs['id']       : '';
    $mavWrapperClass    = isset($mavArgs['wrapper'])    ? $mavArgs['wrapper']           : 'mav-google-map-wrapper';
    $mavContainerClass  = isset($mavArgs['container'])  ? $mavArgs['container']         : 'mav-google-map-ctn';

    if (empty($mavGoogleMapHeight)) {
        $mavGoogleMapHeight = '25vw';
    }

    if (!empty($mavGoogleMap)):
        printf('<div %1$s class="%2$s">',$mavMapId,$mavWrapperClass);
            printf('<div class="%1$s" style="height: %2$s">',$mavContainerClass,$mavGoogleMapHeight);
                printf('<iframe src="%1$s" width="100%%" height="100%%" frameborder="0" style="border:0" allowfullscreen></iframe>',$mavGoogleMap);
            echo '</div>';
        echo '</div>';
    endif;
}