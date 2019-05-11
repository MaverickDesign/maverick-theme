<?php
/**
 * @package mavericktheme
 */

/**
 * Featured Post
 *
 * @param [array] $mav_args
 * @return void
 */

function mavf_post_feature( $mav_args )
{
    if ( ! function_exists( 'mavf_post_query' ) ) {
        return;
    }

    $mav_template               = isset( $mav_args['template'] )                ? $mav_args['template']              : '/template-parts/mav-part-post-feature';
    $mav_class_wrapper          = isset( $mav_args['class_wrapper'] )           ? $mav_args['class_wrapper']         : 'mav-posts__wrp';
    $mav_class_container        = isset( $mav_args['class_container'] )         ? $mav_args['class_container']       : 'mav-posts__ctn';
    $mav_class_wrapper_item     = isset( $mav_args['class_wrapper_item'] )      ? $mav_args['class_wrapper_item']    : 'mav-post__feature--wrp';
    $mav_class_container_item   = isset( $mav_args['class_container_item'] )    ? $mav_args['class_container_item']  : 'mav-post__feature--ctn';
    $mav_button_text            = isset( $mav_args['button_text'] )             ? $mav_args['button_text']           : __( 'Xem chi tiết', 'mavericktheme' );
    $mav_title_side             = isset( $mav_args['title_side'] )              ? $mav_args['title_side']             : '';

    set_query_var( 'mav_class_container_item',  $mav_class_container_item );
    set_query_var( 'mav_class_wrapper_item',    $mav_class_wrapper_item );
    set_query_var( 'mav_button_text',           $mav_button_text );
    set_query_var( 'mav_title_side',            $mav_title_side );

    $mav_post_feature_args = array(
        'query_args'        => $mav_args[ 'query_args' ],
        'class_wrapper'     => $mav_class_wrapper,
        'class_container'   => $mav_class_container,
        'template'          => $mav_template,
    );
    mavf_post_query( $mav_post_feature_args );
}
