<?php
/**
 * @package mavericktheme
 */

function mavf_admin__theme_info__options()
{
    // Display Theme Info
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_theme-info.php';

    // Enable Development Mode
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_dev-mode.php';
}
add_action( 'admin_init', 'mavf_admin__theme_info__options' );

function mavf_admin__theme_info__page()
{
    // Theme Info Page
    include_once TEMPLATE_DIR . '/inc/admin/mav_admin__theme_info__page.php';
}
