<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_theme_config_cpt',
    __( 'Custom Post Types', 'mavericktheme' ),
    'mavf_theme_config_cpt',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_cpt() {
    _e( 'Kích hoạt các chức năng mở rộng', 'mavericktheme' );
}

register_setting(
    'mavog_theme_config',
    'mav_setting_custom_post_type'
);

add_settings_field(
    'mavid_theme_config_theme_support_custom_post_type',
    __( 'Kích hoạt các tính năng', 'mavericktheme' ),
    'mavf_theme_config_theme_support_custom_post_type',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_cpt'
);

function mavf_theme_config_theme_support_custom_post_type() {

    $mav_saved_value = get_option( 'mav_setting_custom_post_type' );

    $mav_custom_post_types = array(
        'testimonial',
        'subscriber',
        'portfolio',
        'member',
        'client',
        'service',
        'product'
    );

    echo '<div class="mav-grid" data-grid-gap>';
    $mavOutput = '';
    foreach ( $mav_custom_post_types as $mavCustomPostType ) {
        $mavChecked = ( @$mav_saved_value[$mavCustomPostType] == 1 ? 'checked' : '' );
        $mavOutput .= '<label><input type="checkbox" id="mavid-custom-post-type-'.$mavCustomPostType.'" name="mav_setting_custom_post_type['.$mavCustomPostType.']" value="1" '.$mavChecked.'/> '.ucfirst($mavCustomPostType).'</label>';
    }
    echo $mavOutput;
    echo '</div>';
}
