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
        TEMPLATE_URI.'/assets/admin/maverick-logo-dashboard.png', 110
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
     * Site Setting Functions
     */
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-site-setting-functions.php';

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
     * Theme Config Functions
     */
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-theme-config-functions.php';

    // Theme Styles - Submenu Page
    add_submenu_page(
        'mav_admin_page_site_setting',
        'Theme Styles',
        'Theme Styles',
        'manage_options',
        'mav_admin_page_theme_styles',
        'mavf_admin_page_theme_styles'
    );

    // Theme Styles Functions
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-theme-styles-functions.php';

    /**
     * Theme Info Submenu Page
     */
    add_submenu_page(
        'mav_admin_page_site_setting',
        'Theme Info',
        'Theme Info',
        'manage_options',
        'mav_admin_page_theme_info',
        'mavf_admin_page_theme_info'
    );
    // Theme Info Functions
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-theme-info-functions.php';

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
        TEMPLATE_URI.'/css/mav-admin-styles.css',
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
        TEMPLATE_URI.'/js/mav-admin-scripts.js',
        array('jquery'),
        '1.0.0',
        true
    );
    wp_enqueue_script( 'mav_admin_script' );

    wp_enqueue_media();
}

add_action( 'admin_enqueue_scripts', 'mavf_enqueue_admin_scripts' );