<?php
/**
 * @package mavericktheme
 */

/* Hero Slider Category ID */
add_settings_section( 'mavsec_site_setting_hero_slider' , 'Hero Slider' , 'mavf_site_setting_hero_slider' , 'mav_admin_page_site_setting' );

function mavf_site_setting_hero_slider() {
}

register_setting( 'mavog_site_setting' , 'mav_setting_hero_slider_id');
add_settings_field( 'mavid_site_setting_hero_slider_id' , 'Default category ID' , 'mavf_site_setting_hero_slider_id' , 'mav_admin_page_site_setting', 'mavsec_site_setting_hero_slider' );

function mavf_site_setting_hero_slider_id() {
    $mav_saved_value = esc_attr( get_option('mav_setting_hero_slider_id') );
    printf( '<input type="text" name="mav_setting_hero_slider_id" value="%1$s" placeholder="Category ID"/>', $mav_saved_value );
}