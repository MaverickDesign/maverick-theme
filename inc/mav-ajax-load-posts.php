<?php
/**
 * @package mavericktheme
 */

// For normal users
add_action( 'wp_ajax_nopriv_mavf_ajax_load_posts', 'mavf_ajax_load_posts' );
// For login users
add_action( 'wp_ajax_mavf_ajax_load_posts', 'mavf_ajax_load_posts' );

function mavf_ajax_load_posts()
{

    if ( isset( $_POST['page'] ) ) {
        $mav_new_page = $_POST['page'] + 1;
    }

    if ( isset( $_POST['style'] ) ) {
        $mav_card_style = $_POST['style'];
        set_query_var( 'mav_card_style', $mav_card_style );
    }

    $mav_args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'paged'                 => $mav_new_page,
        'post__not_in'          => get_option( 'sticky_posts' ),
        'ignore_sticky_posts'   => true
    );

    $mav_query = new WP_Query($mav_args);

    if ( $mav_query->have_posts() ) {
        while ( $mav_query->have_posts() ) {
            $mav_query->the_post();
            get_template_part( "template-parts/mav-card-index", get_post_format() );
        }
        // Reser post data
        wp_reset_postdata();
    } else {
        return;
    }
    die();
}