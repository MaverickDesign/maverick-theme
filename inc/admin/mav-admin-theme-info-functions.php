<?php
/**
 * @package mavericktheme
 */

function mavf_admin_theme_info_options()
{
}
add_action( 'admin_init', 'mavf_admin_theme_info_options' );

function mavf_admin_page_theme_info()
{
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-theme-info.php';
}