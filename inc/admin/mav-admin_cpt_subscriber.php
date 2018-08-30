<?php
/**
 * @package mavericktheme
 */

$mavLabels = array(
    'name'              => __('Subsciber', 'mavericktheme'),
    'singular_name'     => __('Subsciber', 'mavericktheme')
);

$mav_args = array(
    'labels'            => $mavLabels,
    'public'            => true,
    'has_archive'       => false,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array('slug' => __('dang_ky', 'mavericktheme')),
);

register_post_type('mav_cpt_subscriber', $mav_args);

flush_rewrite_rules();