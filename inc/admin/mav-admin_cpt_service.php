<?php
/**
 * @package mavericktheme
 * Custom Post Type: Service
 */

$mav_labels = array(
    'name'              => _x( 'Dịch Vụ', 'mavericktheme' ),
    'singular_name'     => _x( 'Dịch Vụ', 'mavericktheme' ),
    'add_new'           => __( 'Thêm Dịch Vụ mới', 'maverick-theme' ),
    'all_items'         => __( 'Tất cả Dịch Vụ', 'maverick-theme' ),
);

$mav_args = array(
    'labels'        => $mav_labels,
    'public'        => true,
    'has_archive'   => false,
    'supports'      => array(
        'title', 'editor', 'thumbnail'
    ),
    'taxonomies'    => array(
        'category', 'post_tag'
    ),
    'rewrite'       => array(
        'slug' => __( 'service', 'mavericktheme' )
    ),
);

register_post_type( 'mav_cpt_service', $mav_args );

flush_rewrite_rules();
