<?php
/**
 * @package mavericktheme
 * Maverick Theme Custom Post Types
 */

function mavf_cpt() {
    // Get option for CPTs in Theme Config
    $mavCPTs = get_option( 'mav_setting_custom_post_type' );

    /**
     * Service Post Type
     */
    if ( @$mavCPTs['service'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_service.php';
    }

    add_post_type_support( 'mav_cpt_service', 'excerpt');

    /**
     * Testimonial Post Type
     */
    if ( @$mavCPTs['testimonial'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_testimonial.php';
    }

    /**
     * Subscriber Post Type
     */
    if ( @$mavCPTs['subscriber'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_subscriber.php';
    }

    /**
     * Portfolio Post Type
     */
    if ( @$mavCPTs['portfolio'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_portfolio.php';
    }

    /**
     * Product Post Type
     */
    if ( @$mavCPTs['product'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_product.php';
    }

    /**
     * Member Post Type
     */
    if ( @$mavCPTs['member'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_member.php';
    }

    /**
     * Client Post Type
     */
    if ( @$mavCPTs['client'] ) {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_client.php';
    }
}
add_action( 'init', 'mavf_cpt' );

flush_rewrite_rules();

/**
 * Show Custom Post Type in Archive Page
 *
 * @param [type] $mav_query
 * @return void
 */
function mav_show_cpt_archives( $mav_query ) {
    if ( is_category() || is_tag() && empty( $mav_query->query_vars['suppress_filters'] ) ) {
        $mav_query->set( 'post_type', array(
            'post',
            'nav_menu_item',
            'mav_cpt_client',
            'mav_cpt_portfolio',
            'mav_cpt_member',
            'mav_cpt_service',
            'mav_cpt_product',
            )
        );
        return $mav_query;
    }
}
add_filter( 'pre_get_posts', 'mav_show_cpt_archives' );
