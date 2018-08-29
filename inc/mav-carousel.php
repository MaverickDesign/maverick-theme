<?php
/**
 * @package maverick-theme
 */

function mavf_carousel($mav_args)
{
    if (function_exists('mavf_unique')) {
        $mav_unique_number = mavf_unique(rand(4, 16));
    } else {
        $mav_unique_number = wp_create_nonce(time());
    }

    // Post type
    $mav_post_type        = isset($mav_args['post_type'])          ? $mav_args['post_type']         : 'post';

    // Number of posts to query
    $mavNumberOfPosts   = isset($mav_args['number_of_posts'])    ? $mav_args['number_of_posts']   : 5;

    // Number of posts to display
    $mavPostsToDipslay  = isset($mav_args['display'])            ? $mav_args['display']           : 4;

    // Specific post ids
    $mavPostIn          = isset($mav_args['post_in'])            ? $mav_args['post_in']           : '';

    // Post categories
    $mav_categories      = isset($mav_args['categories'])         ? $mav_args['categories']        : '';

    // Carousel class
    $mavCarouselClass   = isset($mav_args['carousel_class'])     ? $mav_args['carousel_class']    : 'mav-carousel';

    // Carousel item class
    $mavItemClass       = isset($mav_args['item_class'])         ? $mav_args['item_class']        : 'mav-carousel-item';

    // Carousel item container class
    $mavContainerClass  = isset($mav_args['container_class'])    ? $mav_args['container_class']   : 'mav-carousel-ctn';

    // Carousel wrapper class
    $mavWrapperClass    = isset($mav_args['wrapper_class'])      ? $mav_args['wrapper_class']     : 'mav-carousel-wrapper';

    // Carousel nav wrapper class
    $mavNavWrapperClass = isset($mav_args['nav_wrapper_class'])  ? $mav_args['nav_wrapper_class'] : 'mav-carousel-nav-wrapper';

    // Carousel nav class
    $mavNavClass        = isset($mav_args['nav_class'])          ? $mav_args['nav_class']         : 'mav-carousel-nav';

    // Carousel item content template
    $mavTemplate        = isset($mav_args['template'])           ? $mav_args['template']          : 'template-parts/content';

    // Carousel auto slide
    $mavAutoSlide       = isset($mav_args['auto_slide'])         ? $mav_args['auto_slide']        : 'true';

    // Carousel slide interval
    $mav_interval        = isset($mav_args['interval'])           ? $mav_args['interval']          : 4000;

    $mav_post_queries     = isset($mav_args['post_queries'])       ? $mav_args['post_queries']      : array();

    // Query arguments
    $mav_query_args = array();

    if (!empty($mav_post_queries)) {
        $mav_query_args = $mav_post_queries;
        if (!empty($mav_query_args['posts_per_page'])) {
            $mavNumberOfPosts = $mav_query_args['posts_per_page'];
        }
    } else {
        $mav_query_args = array(
            'post_type'                 => $mav_post_type,
            'posts_per_page'            => $mavNumberOfPosts,
            'ignore_sticky_posts'       => true,
            'post__in'                  => $mavPostIn,
            'post__not_in'              => array(get_the_ID()),
            'category__in'              => $mav_categories,
        );
    }

    $mav_query = new WP_Query($mav_query_args);

    if ($mav_query->have_posts()) {
        printf(
            '<div id="mavid-carousel-%2$s" data-unique="%2$s" data-total="%3$s" data-display="%4$s" data-current-direction="prev" data-auto-slide="%5$s" data-interval="%6$s" class="%1$s">',
            $mavCarouselClass, $mav_unique_number, $mavNumberOfPosts, $mavPostsToDipslay, $mavAutoSlide, $mav_interval
        );
            printf(
                '<div class="%3$s">
                    <nav data-direction="prev" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s"></nav>
                </div>',
                $mavNavClass, $mav_unique_number, $mavNavWrapperClass
            );
            printf('<div class="%1$s">', $mavWrapperClass);
                printf(
                    '<ul id="mavid-carousel-ctn-%1$s" class="%2$s" data-container="true">',
                    $mav_unique_number, $mavContainerClass
                );
                    $i = 1;
                    // The Loop
                    while ($mav_query->have_posts()) :
                        $mav_query->the_post();
                            printf('<li data-item-number="%2$s" data-gutter="" class="%1$s">', $mavItemClass, $i++);
                                get_template_part($mavTemplate, get_post_format());
                            echo '</li>';
                    endwhile;
                    // Reset post data
                    wp_reset_query();
                echo '</ul>';
            echo '</div>';

            printf(
                '<div class="%3$s">
                    <nav data-direction="next" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s mav-hide"></nav>
                </div>',
                $mavNavClass, $mav_unique_number, $mavNavWrapperClass
            );
        echo '</div>';
    } else {
        printf(
            '<div class="mav-flex-center-all"><span>%2$s %1$s</span></div>',
            get_the_category()[0]->name, __('Không có bài nào cùng chuyên mục', 'maverick-theme')
        );
    }
}