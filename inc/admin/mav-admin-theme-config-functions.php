<?php
/**
 * @package mavericktheme
 */

function mavf_admin_theme_config_options()
{

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

    // Blog Page Settings
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_blog-page.php';

    // BreadCrumbs
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_breadcrumbs.php';

}
add_action( 'admin_init', 'mavf_admin_theme_config_options' );

// Create admin page for Theme Config
function mavf_admin_page_theme_config()
{
    require_once TEMPLATE_DIR.'/inc/admin/mav-admin-theme-config.php';
}