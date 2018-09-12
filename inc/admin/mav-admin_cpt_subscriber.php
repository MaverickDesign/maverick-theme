<?php
/**
 * @package mavericktheme
 */

$mav_labels = array(
    'name'              => __( 'Subsciber', 'mavericktheme' ),
    'singular_name'     => __( 'Subsciber', 'mavericktheme' )
);

$mav_args = array(
    'labels'            => $mav_labels,
    'public'            => true,
    'has_archive'       => false,
    'supports'          => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array(
        'slug' => __( 'subscriber', 'mavericktheme' )
    ),
);

register_post_type( 'mav_cpt_subscriber', $mav_args );

flush_rewrite_rules();
