<?php
/**
 * @package maverick-theme
 */

$mavMemberLabels = array(
    'name'              => __('Member','maverick-theme'),
    'singular_name'     => __('Member','maverick-theme')
);

$mavMemberArgs = array(
    'labels'        => $mavMemberLabels,
    'public'        => true,
    'has_archive'   => true
);

register_post_type( 'mav_member', $mavMemberArgs );