<?php
/**
 * @package maverick-theme
 */

$mav_client_labels = array(
    'name'              => __('Khách hàng', 'maverick-theme'),
    'singular_name'     => __('Khách hàng', 'maverick-theme')
);

$mav_client_args = array(
    'labels'        => $mav_client_labels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'       => array('slug' => __('khach-hang', 'maverick-theme')),
);

register_post_type('mav_cpt_client', $mav_client_args);

flush_rewrite_rules();