<?php
/**
 * @package mavericktheme
 * Maverick Theme Custom Post Types
 */

function mavf_cpt()
{
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
    if ( @$mavCPTs['client'] )
    {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_client.php';
    }

    /**
     * Event Post Type
     */
    if ( @$mavCPTs['event'] )
    {
        include_once TEMPLATE_DIR . '/inc/admin/mav-admin_cpt_event.php';
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
function mav_show_cpt_archives( $mav_query )
{
    if ( is_category() || is_tag() && empty( $mav_query->query_vars['suppress_filters'] ) ) {
        $mav_query->set( 'post_type', array(
            'post',
            'nav_menu_item',
            'mav_cpt_client',
            'mav_cpt_portfolio',
            'mav_cpt_member',
            'mav_cpt_service',
            'mav_cpt_product',
            'mav_cpt_event',
            )
        );
        return $mav_query;
    }
}
add_filter( 'pre_get_posts', 'mav_show_cpt_archives' );

function mavf_taxonomies()
{

	$mav_event_component = array(
		'name'              => _x( 'Thành phần', 'taxonomy general name', 'camnangluat' ),
		'singular_name'     => _x( 'Thành phần', 'taxonomy singular name', 'camnangluat' ),
		'search_items'      => __( 'Tìm Thành phần', 'camnangluat' ),
		'all_items'         => __( 'Tất cả Thành phần', 'camnangluat' ),
		'parent_item'       => __( 'Thành phần trên cấp', 'camnangluat' ),
		'parent_item_colon' => __( 'Thành phần trên cấp:', 'camnangluat' ),
		'edit_item'         => __( 'Sửa chữa Thành phần', 'camnangluat' ),
		'update_item'       => __( 'Cập nhật Thành phần', 'camnangluat' ),
		'add_new_item'      => __( 'Thêm một Thành phần mới', 'camnangluat' ),
		'new_item_name'     => __( 'Thêm tên một Thành phần mới', 'camnangluat' ),
		'menu_name'         => __( 'Thành phần', 'camnangluat' ),
    );

	$mav_args_component = array(
		'hierarchical'      => true,
		'labels'            => $mav_event_component,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'thanh-phan' ),
    );

	register_taxonomy(
        'mav_event_component',
        array(
            'mav_cpt_event'
        ),
        $mav_args_component
    );
}

add_action( 'init' , 'mavf_taxonomies' );
