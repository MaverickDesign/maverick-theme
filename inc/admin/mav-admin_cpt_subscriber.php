<?php
/**
 * @package maverick-theme
 */

$mavSubscriberLabels = array(
    'name'              => __('Subsciber','maverick-theme'),
    'singular_name'     => __('Subsciber','maverick-theme')
);

$mavSubscriberArgs = array(
    'labels'            => $mavSubscriberLabels,
    'public'            => true,
    'has_archive'       => false
);

register_post_type( 'mav_subscriber', $mavSubscriberArgs );