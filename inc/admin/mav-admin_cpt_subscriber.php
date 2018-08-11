<?php
/**
 * @package maverick-theme
 */

$mavLabels = array(
    'name'              => __('Subsciber','maverick-theme'),
    'singular_name'     => __('Subsciber','maverick-theme')
);

$mavArgs = array(
    'labels'            => $mavLabels,
    'public'            => true,
    'has_archive'       => false,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array( 'slug' => __( 'dang_ky' , 'maverick-theme' ) ),
);

register_post_type( 'mav_cpt_subscriber', $mavArgs );

flush_rewrite_rules();