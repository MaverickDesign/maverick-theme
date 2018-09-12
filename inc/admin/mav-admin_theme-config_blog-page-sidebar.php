<?php
/**
 * @package mavericktheme
 */

register_setting( 'mavog_theme_config', 'mav_setting_blog_page_sidebar' );

add_settings_field(
    'mavid_theme_setting_blog_page_sidebar',
    __( 'Hiển thị thanh Sidebar', 'mavericktheme' ),
    'mavf_theme_config_blog_page_sidebar',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_sidebar()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<label><input id="mavid-blog-page-sidebar" type="checkbox" name="mav_setting_blog_page_sidebar" value="1" %1$s/></label>',
        $mav_checked
    );
}
