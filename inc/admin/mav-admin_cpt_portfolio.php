<?php
/**
 * @package mavericktheme
 */

$mavLabels = array(
    'name'              => __('Portfolio', 'mavericktheme'),
    'singular_name'     => __('Portfolio', 'mavericktheme')
);

$mav_args = array(
    'labels'        => $mavLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'taxonomies'    => array('category'),
    'rewrite'       => array('slug' => __('san_pham', 'mavericktheme')),
);

register_post_type('mav_cpt_portfolio', $mav_args);

flush_rewrite_rules();