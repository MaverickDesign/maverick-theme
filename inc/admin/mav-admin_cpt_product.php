<?php
/**
 * @package mavericktheme
 */

$mav_labels = array(
    'name'              => _x( 'Sản phẩm', 'mavericktheme' ),
    'singular_name'     => _x( 'Sản phẩm', 'mavericktheme' ),
    'add_new'           => __( 'Thêm Sản phẩm mới', 'maverick-theme' ),
    'all_items'         => __( 'Tất cả Sản phẩm', 'maverick-theme' ),
);

$mav_args = array(
    'labels'        => $mav_labels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title', 'editor', 'thumbnail'
    ),
    'taxonomies'    => array(
        'category', 'post_tag'
    ),
    'rewrite'       => array(
        'slug' => __( 'product', 'mavericktheme' )
    ),
);

register_post_type( 'mav_cpt_product', $mav_args );

flush_rewrite_rules();