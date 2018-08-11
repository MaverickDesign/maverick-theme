<?php
/**
 * @package maverick-theme
 */

$mavLabels = array(
    'name'              => __('Testimonial','maverick-theme'),
    'singular_name'     => __('Testimonial','maverick-theme')
);

$mavArgs = array(
    'labels'        => $mavLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array( 'slug' => __( 'nhan_xet' , 'maverick-theme' ) ),
);

register_post_type( 'mav_cpt_testimonial', $mavArgs );

flush_rewrite_rules();