<?php
/**
 * @package mavericktheme
 */

function mavf_admin_init()
{
    /**
     * Add Admin Page ~ Site Setting Page
     */
    add_menu_page(
        'Maverick Theme',
        'Maverick Theme',
        'manage_options',
        'mav_admin_page_site_setting',
        'mavf_admin_page_site_setting',
        THEME_DIR.'/assets/admin/maverick-logo-dashboard.png', 110
    );

    /**
     * Add Site Setting Submenu Page
     */
    add_submenu_page(
        'mav_admin_page_site_setting',
        'Site Settings',
        'Site Settings',
        'manage_options',
        'mav_admin_page_site_setting',
        'mavf_admin_page_site_setting'
    );

    /**
     * Add Theme Config Submenu Page
     */
    add_submenu_page(
        'mav_admin_page_site_setting',
        'Theme Config',
        'Theme Config',
        'manage_options',
        'mav_admin_page_theme_config',
        'mavf_admin_page_theme_config'
    );

    /**
     * Site Setting Functions
     */
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-site-setting-functions.php';

    /**
     * Theme Config Functions
     */
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-theme-config-functions.php';
}
add_action('admin_menu', 'mavf_admin_init');

/**
 * For admin panel
 */
function mavf_enqueue_admin_scripts( $mavHook )
{
    /**
     * Admin panel css
     */
    wp_register_style(
        'mav_admin_css',
        THEME_DIR.'/css/mav-admin-styles.css',
        array(),
        '1.0.0',
        'all'
    );
    wp_enqueue_style('mav_admin_css');

    /**
     * Admin Panel Javascript
     */
    wp_register_script(
        'mav_admin_script',
        THEME_DIR.'/js/mav-admin-scripts.js',
        array('jquery'),
        '1.0.0',
        true
    );
    wp_enqueue_script( 'mav_admin_script' );

    wp_enqueue_media();
}

add_action( 'admin_enqueue_scripts', 'mavf_enqueue_admin_scripts' );