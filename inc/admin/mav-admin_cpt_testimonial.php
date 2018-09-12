<?php
/**
 * @package mavericktheme
 */

$mavLabels = array(
    'name'              => __( 'Testimonial', 'mavericktheme' ),
    'singular_name'     => __( 'Testimonial', 'mavericktheme' )
);

$mav_args = array(
    'labels'        => $mavLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'       => array(
        'slug' => __( 'testimonial', 'mavericktheme' )
    ),
);

register_post_type( 'mav_cpt_testimonial', $mav_args );

flush_rewrite_rules();