<?php
/**
 * @package maverick-theme
 */

function mavf_post_feature($mavArgs) {

    $mavType            = isset($mavArgs['type'])               ? $mavArgs['type']              : 1;
    $mavPostType        = isset($mavArgs['post_type'])          ? $mavArgs['post_type']         : 'post';
    $mavNumberOfPosts   = isset($mavArgs['number_of_posts'])    ? $mavArgs['number_of_posts']   : 1;
    $mavPostIn          = isset($mavArgs['post_in'])            ? $mavArgs['post_in']           : '';
    $mavTitleSide       = isset($mavArgs['title_side'])         ? ' '.$mavArgs['title_side']    : '';
    $mavHeight          = isset($mavArgs['height'])             ? $mavArgs['height']            : '40vh';

    $mavArticleClass                = 'mav-post-feature';
    $mavArticleWrapperClass         = 'mav-post-feature-wrapper';
    $mavPostFeatureContainerClass   = 'mav-post-feature-ctn';
    $mavClassFigure                 = 'mav-post-feature-figure';
    $mavClassTitleWrapper           = 'mav-post-feature-title-wrapper';
    $mavClassTitleContainer         = 'mav-post-feature-title-ctn';
    $mavClassTitle                  = 'mav-post-feature-title';
    $mavClassButton                 = 'mav-btn-solid';

    if(!empty($mavPostIn)){
        foreach($mavPostIn as $mavPostID) {

            $mavQueryArgs = array(
                'post_type'         => $mavPostType,
                'posts_per_page'    => $mavNumberOfPosts,
                'post__not_in'      => get_option("sticky_posts"),
                'p'                 => $mavPostID
            );

            $mavQuery = new WP_Query( $mavQueryArgs );

            if ($mavQuery -> have_posts()) {
                while ($mavQuery -> have_posts()) {
                    $mavQuery -> the_post();
                    switch ($mavType) {
                        case 1:
                            printf(sprintf('<article data-type="%1$s" class="%2$s %3$s %4$s">',$mavType,$mavArticleClass,$mavArticleWrapperClass,$mavTitleSide));
                                printf(sprintf('<div class="%1$s" style="min-height: %2$s">',$mavPostFeatureContainerClass,$mavHeight));
                                    printf(sprintf('<figure class="%3$s" style="background-image: url(%1$s); min-height: %2$s;">',get_the_post_thumbnail_url(get_the_ID(),'full'),$mavHeight,$mavClassFigure));
                                    printf('</figure>');
                                    printf(sprintf('<div class="%1$s mav-right">',$mavClassTitleWrapper));
                                        printf(sprintf('<div class="%1$s">',$mavClassTitleContainer));
                                            printf(sprintf('<h2 class="%1$s">%2$s</h2>',$mavClassTitle,get_the_title()));
                                            printf(sprintf('<div>%1$s</div>',get_the_excerpt()));
                                            printf(sprintf('<a href="%1$s" class="%3$s" title="%2$s">%2$s</a>',get_the_permalink(),__('Xem chi tiết','maverick-theme'),$mavClassButton));
                                        printf('</div>');
                                    printf('</div>');
                                printf('</div>');
                            printf('</article>');
                        break; // End of Default

                        case 2:
                            printf(sprintf('<article data-type="%1$s" class="%2$s %3$s %4$s">',$mavType,$mavArticleClass,$mavArticleWrapperClass,$mavTitleSide));
                            printf('</article>');
                        break; // End Case 2
                    } // End Switch
                } // End While
            } // End If
            wp_reset_postdata();
        }
    }
}