<?php
/**
 * @package mavericktheme
 * Custom Post Type: Event
 */

$mav_labels = array(
    'name'              => _x( 'Sự kiện', 'mavericktheme' ),
    'singular_name'     => _x( 'Sự kiện', 'mavericktheme' ),
    'add_new'           => __( 'Thêm Sự kiện mới', 'mavericktheme' ),
    'all_items'         => __( 'Tất cả Sự kiện', 'mavericktheme' ),
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
        'slug' => __( 'event', 'mavericktheme' )
    ),
);

register_post_type( 'mav_cpt_event', $mav_args );

flush_rewrite_rules();
