<?php
/**
 * @package maverick-theme
 */

$mavLabels = array(
    'name'              => __('Portfolio','maverick-theme'),
    'singular_name'     => __('Portfolio','maverick-theme')
);

$mavArgs = array(
    'labels'        => $mavLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array( 'slug' => __( 'san_pham' , 'maverick-theme' ) ),
);

register_post_type( 'mav_cpt_portfolio', $mavArgs );

flush_rewrite_rules();