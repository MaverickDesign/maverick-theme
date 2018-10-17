<?php
/**
 * @package mavericktheme
 */

$mav_labels = array(
    'name'              => _x( 'Portfolio', 'mavericktheme' ),
    'singular_name'     => _x( 'Portfolio', 'mavericktheme' ),
    'add_new'           => __( 'Thêm Portfolio mới', 'mavericktheme' ),
    'all_items'         => __( 'Tất cả Portfolio', 'mavericktheme' ),
);

$mav_args = array(
    'labels'        => $mav_labels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title', 'editor', 'thumbnail'
    ),
    'taxonomies'    => array( 'category', 'post_tag' ),
    'rewrite'       => array( 'slug' => __( 'portfolio', 'mavericktheme' ) ),
);

register_post_type( 'mav_cpt_portfolio', $mav_args );

flush_rewrite_rules();