<?php
/**
 * @package mavericktheme
 */

$mavMemberLabels = array(
    'name'              => __('Member', 'mavericktheme'),
    'singular_name'     => __('Member', 'mavericktheme')
);

$mavMemberArgs = array(
    'labels'        => $mavMemberLabels,
    'public'        => true,
    'has_archive'   => true,
    'supports'      => array(
        'title','editor','thumbnail'
    ),
    'rewrite'            => array('slug' => __('thanh_vien', 'mavericktheme')),
);

register_post_type('mav_cpt_member', $mavMemberArgs);

flush_rewrite_rules();