<?php
/**
 * @package mavericktheme
 */

function mavf_admin_theme_config_options()
{

    // Enable Development Mode
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_dev-mode.php';

    // Display Theme Info
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_theme-info.php';

    /**
     * Section: Theme Supports
     */
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_theme-supports.php';

    // Post formats
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_post-format.php';

    // Grid system
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_grid-system.php';

    // Custom Post Types
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_cpt.php';


    /**
     * Section: Theme Settings
     */
    add_settings_section(
        'mavsec_theme_config_theme_setting',
        __( 'Trang Blog', 'mavericktheme' ),
        'mavf_theme_config_theme_setting',
        'mav_admin_page_theme_config'
    );

    // Load more post via Ajax
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_ajax-load-posts.php';

    // Show sidebar
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_blog-page-sidebar.php';

    // Blog page columns
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_blog-page-columns.php';

    // BreadCrumbs
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_breadcrumbs.php';

}
add_action( 'admin_init', 'mavf_admin_theme_config_options' );

// Create admin page for Theme Config
function mavf_admin_page_theme_config()
{
    require_once TEMPLATE_DIR.'/inc/admin/mav-admin-theme-config.php';
}

function mavf_theme_config_theme_setting()
{
    printf( '<p class="mav-desc">%1$s</p>', __( 'Thiết lập cho trang Blog', 'mavericktheme' ) );
}