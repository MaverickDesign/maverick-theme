<?php
/**
 * @package mavericktheme
 * Maverick Theme Custom Post Types
 */

function mavf_cpt()
{
    // Get option for CPTs in Theme Config
    $mavCPTs = get_option('mav_setting_custom_post_type');

    /**
     * Testimonial Post Type
     */
    if (@$mavCPTs['testimonial']) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_testimonial.php';
    }

    /**
     * Subscriber Post Type
     */
    if (@$mavCPTs['subscriber']) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_subscriber.php';
    }

    /**
     * Portfolio Post Type
     */
    if (@$mavCPTs['portfolio']) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_portfolio.php';
    }

    /**
     * Member Post Type
     */
    if (@$mavCPTs['member']) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_member.php';
    }

    /**
     * Client Post Type
     */
    if (@$mavCPTs['client']) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_client.php';
    }
}
add_action('init', 'mavf_cpt');

flush_rewrite_rules();