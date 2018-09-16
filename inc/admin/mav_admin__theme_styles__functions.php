<?php
/**
 * @package mavericktheme
 */

function mavf_admin__theme_style__options()
{
    include_once TEMPLATE_DIR.'/inc/admin/mav_admin__theme_styles__colors.php';
}
add_action( 'admin_init', 'mavf_admin__theme_style__options' );

function mavf_admin__theme_styles__page()
{
    include_once TEMPLATE_DIR . '/inc/admin/mav_admin__theme_styles__page.php';
}
