<?php
/**
 * @package mavericktheme
 */

function mavf_admin__theme_info__options()
{
    // Setting goes here
}
add_action( 'admin_init', 'mavf_admin__theme_info__options' );

function mavf_admin__theme_info__page()
{
    // Theme Info Page
    include_once TEMPLATE_DIR . '/inc/admin/mav_admin__theme_info__page.php';
}