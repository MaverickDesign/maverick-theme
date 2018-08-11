<?php
/**
 * @package maverick-theme
 */

 $mavClientLabels = array(
    'name'              => __('Client','maverick-theme'),
    'singular_name'     => __('Client','maverick-theme')
);

$mavClientArgs = array(
    'labels'        => $mavClientLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array( 'slug' => __( 'khach-hang' , 'maverick-theme' ) ),
);

register_post_type( 'mav_cpt_client', $mavClientArgs );

flush_rewrite_rules();