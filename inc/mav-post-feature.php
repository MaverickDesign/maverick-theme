<?php
/**
 * @package maverick-theme
 */

function mavf_post_feature($mavArgs) {

    $mavTemplate            = isset($mavArgs['template'])               ? $mavArgs['template']              : '/template-parts/mav-part-post-feature';

    $mavClassWrapper        = isset($mavArgs['class_wrapper'])          ? $mavArgs['class_wrapper']         : 'mav-posts-wrapper';
    $mavClassContainer      = isset($mavArgs['class_container'])        ? $mavArgs['class_container']       : 'mav-posts-ctn';

    $mavClassWrapperItem    = isset($mavArgs['class_wrapper_item'])     ? $mavArgs['class_wrapper_item']    : 'mav-post-feature-wrapper';
    $mavClassContainerItem  = isset($mavArgs['class_container_item'])   ? $mavArgs['class_container_item']  : 'mav-post-feature-ctn';

    $mavButtonText          = isset($mavArgs['button_text'])            ? $mavArgs['button_text']           : __('Xem chi tiết','maverick-theme');

    $mavTitleSide           = isset($mavArgs['title_side'])            ? $mavArgs['title_side']             : '';

    set_query_var( 'mavClassContainerItem'  , $mavClassContainerItem );
    set_query_var( 'mavClassWrapperItem'    , $mavClassWrapperItem );
    set_query_var( 'mavButtonText'          , $mavButtonText );
    set_query_var( 'mavTitleSide'           , $mavTitleSide );

    $mavPostFeatureArgs = array(
        'query_args'        => $mavArgs['query_args'],
        'class_wrapper'     => $mavClassWrapper,
        'class_container'   => $mavClassContainer,
        'template'          => $mavTemplate,
    );
    mavf_post_query($mavPostFeatureArgs);

}