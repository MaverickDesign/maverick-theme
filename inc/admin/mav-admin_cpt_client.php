<?php
/**
 * @package mavericktheme
 */

$mav_client_labels = array(
    'name'              => __('Khách hàng', 'mavericktheme'),
    'singular_name'     => __('Khách hàng', 'mavericktheme')
);

$mav_client_args = array(
    'labels'        => $mav_client_labels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'taxonomies'    => array( 'category', 'post_tag' ),
    'rewrite'       => array( 'slug' => __('khach-hang', 'mavericktheme') ),
);

register_post_type( 'mav_cpt_client', $mav_client_args );

flush_rewrite_rules();