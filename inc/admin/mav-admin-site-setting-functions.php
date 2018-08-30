<?php
/**
 * @package mavericktheme
 */

function mavf_admin_site_setting_options()
{
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_brand.php';

    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_social-accounts.php';

    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_facebook-app.php';

    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_google-analytic.php';

    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_google-map.php';

    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_maintenance.php';

    // require_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_hero-slider.php';

    // Terms and Conditions settings
    include_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_terms.php';

}
add_action('admin_init', 'mavf_admin_site_setting_options');

function mavf_admin_page_site_setting()
{
    include_once TEMPLATE_DIR . '/inc/admin/mav-admin-site-setting.php';
}