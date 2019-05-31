<?php
/**
 * @package mavericktheme
 */

/* Site Setting Page */
function mavf_admin_page_site_setting()
{
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-site-setting.php';
}

/* Site Setting Page Functions */
function mavf_admin_site_setting_options()
{
    // Brand settings
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_brand.php';

    // Social Accounts
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_social-accounts.php';

    // Facebook App
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_facebook-app.php';

    // Google Services
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_google-analytic.php';
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_google-map.php';

    // Social Sharings
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_social-sharing.php';

    // Maintenance Mode
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_maintenance.php';

    // Terms and Conditions
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_terms.php';
}
add_action( 'admin_init', 'mavf_admin_site_setting_options' );