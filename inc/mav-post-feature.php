<?php
/**
 * @package maverick-theme
 */

// function mavf_post_feature($mavArgs) {

//     $mavType            = isset($mavArgs['type'])               ? $mavArgs['type']              : 1;
//     $mavPostType        = isset($mavArgs['post_type'])          ? $mavArgs['post_type']         : 'post';
//     $mavNumberOfPosts   = isset($mavArgs['number_of_posts'])    ? $mavArgs['number_of_posts']   : 1;
//     $mavPostIn          = isset($mavArgs['post_in'])            ? $mavArgs['post_in']           : '';
//     $mavTitleSide       = isset($mavArgs['title_side'])         ? ' '.$mavArgs['title_side']    : '';
//     $mavHeight          = isset($mavArgs['height'])             ? $mavArgs['height']            : '40vh';
//     $mavButtonText      = isset($mavArgs['button_text'])        ? $mavArgs['button_text']       : __('Xem chi tiết','maverick-theme');

//     $mavArticleClass                = 'mav-post-feature';
//     $mavArticleWrapperClass         = 'mav-post-feature-wrapper';
//     $mavPostFeatureContainerClass   = 'mav-post-feature-ctn';
//     $mavClassFigure                 = 'mav-post-feature-figure';
//     $mavClassTitleWrapper           = 'mav-post-feature-title-wrapper';
//     $mavClassTitleContainer         = 'mav-post-feature-title-ctn';
//     $mavClassTitle                  = 'mav-post-feature-title';
//     $mavClassButton                 = 'mav-btn-cta';
//     $mavClassIntro                  = 'mav-post-feature-intro';

//     if(!empty($mavPostIn)){
//         foreach($mavPostIn as $mavPostID) {

//             $mavQueryArgs = array(
//                 'post_type'         => $mavPostType,
//                 'posts_per_page'    => $mavNumberOfPosts,
//                 'post__not_in'      => get_option("sticky_posts"),
//                 'p'                 => $mavPostID
//             );

//             $mavQuery = new WP_Query( $mavQueryArgs );

//             if ($mavQuery -> have_posts()) {
//                 while ($mavQuery -> have_posts()) {
//                     $mavQuery -> the_post();
//                     switch ($mavType) {
//                         case 1:
//                             printf(
//                                 '<div data-type="%1$s" class="%2$s %3$s %4$s">',
//                                 $mavType, $mavArticleClass, $mavArticleWrapperClass, $mavTitleSide
//                             );
//                                 printf(
//                                     '<div class="%1$s" style="min-height: %2$s">',
//                                     $mavPostFeatureContainerClass, $mavHeight
//                                 );
//                                     printf(
//                                         '<figure class="%3$s" style="background-image: url(%1$s); min-height: %2$s;">',
//                                         get_the_post_thumbnail_url(get_the_ID(),'full'), $mavHeight, $mavClassFigure
//                                     );
//                                     printf('</figure>');
//                                     printf(
//                                         '<div class="%1$s mav-right">',
//                                         $mavClassTitleWrapper
//                                     );
//                                         printf(
//                                             '<div class="%1$s">',
//                                             $mavClassTitleContainer
//                                         );
//                                             printf(
//                                                 '<h2 class="%1$s">%2$s</h2>',
//                                                 $mavClassTitle, get_the_title()
//                                             );
//                                             $mavIntro = ($mavPostType == 'page') ? get_post_meta( get_the_ID(), 'mav_page_intro', true ) : get_the_excerpt();
//                                             printf(
//                                                 '<div class="%2$s"><p>%1$s</p></div>',
//                                                 $mavIntro, $mavClassIntro
//                                             );
//                                             printf(
//                                                 '<a href="%1$s" class="mav-btn-wrapper" title="%2$s"><button class="%3$s" data-full-width>%2$s</button></a>',
//                                                 get_the_permalink(), $mavButtonText, $mavClassButton
//                                             );
//                                         printf('</div>');
//                                     printf('</div>');
//                                 printf('</div>');
//                             printf('</div>');
//                         break;

//                         case 2:
//                             printf(
//                                 '<div data-type="%1$s" class="%2$s %3$s %4$s">',
//                                 $mavType, $mavArticleClass, $mavArticleWrapperClass, $mavTitleSide
//                             );
//                             printf('</div>');
//                         break;
//                     } // End Switch
//                 } // End While
//             } // End If
//             wp_reset_postdata();
//         }
//     }
// }

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