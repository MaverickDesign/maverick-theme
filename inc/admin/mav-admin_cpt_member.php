<?php
/**
 * @package maverick-theme
 */

$mavMemberLabels = array(
    'name'              => __('Member', 'maverick-theme'),
    'singular_name'     => __('Member', 'maverick-theme')
);

$mavMemberArgs = array(
    'labels'        => $mavMemberLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array('slug' => __('thanh_vien', 'maverick-theme')),
);

register_post_type('mav_cpt_member', $mavMemberArgs);

flush_rewrite_rules();