<?php
/**
 * @package maverick-theme
 */

function mavf_post_feature($mav_args)
{
    // Check if mavf_post_query function exist
    if (!function_exists('mavf_post_query')) {
        return;
    }

    $mavTemplate            = isset($mav_args['template'])               ? $mav_args['template']              : '/template-parts/mav-part-post-feature';

    $mavClassWrapper        = isset($mav_args['class_wrapper'])          ? $mav_args['class_wrapper']         : 'mav-posts-wrapper';
    $mavClassContainer      = isset($mav_args['class_container'])        ? $mav_args['class_container']       : 'mav-posts-ctn';

    $mavClassWrapperItem    = isset($mav_args['class_wrapper_item'])     ? $mav_args['class_wrapper_item']    : 'mav-post-feature-wrapper';
    $mavClassContainerItem  = isset($mav_args['class_container_item'])   ? $mav_args['class_container_item']  : 'mav-post-feature-ctn';

    $mavButtonText          = isset($mav_args['button_text'])            ? $mav_args['button_text']           : __('Xem chi tiết','maverick-theme');

    $mavTitleSide           = isset($mav_args['title_side'])            ? $mav_args['title_side']             : '';

    set_query_var('mavClassContainerItem',  $mavClassContainerItem);
    set_query_var('mavClassWrapperItem',    $mavClassWrapperItem);
    set_query_var('mavButtonText',          $mavButtonText);
    set_query_var('mavTitleSide',           $mavTitleSide);

    $mavPostFeatureArgs = array(
        'query_args'        => $mav_args['query_args'],
        'class_wrapper'     => $mavClassWrapper,
        'class_container'   => $mavClassContainer,
        'template'          => $mavTemplate,
    );
    mavf_post_query($mavPostFeatureArgs);
}