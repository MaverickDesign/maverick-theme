<?php
/**
 * @package mavericktheme
 */

function mavf_admin_theme_style_options()
{
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-styles_colors.php';
}
add_action( 'admin_init', 'mavf_admin_theme_style_options' );

function mavf_admin_page_theme_styles()
{
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-theme-styles.php';
}
