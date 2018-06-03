<?php
/*
 * @package mavericktheme
 */

function mavf_carousel($mavArgs){

    if (function_exists(mavf_unique)) {
        $mavUniqueNumber = mavf_unique(rand(4,16));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }

    // Post type
    $mavPostType        = isset($mavArgs['post_type'])          ? $mavArgs['post_type']         : 'post';

    // Number of posts to query
    $mavNumberOfPosts   = isset($mavArgs['number_of_posts'])    ? $mavArgs['number_of_posts']   : 5;

    // Number of posts to display
    $mavPostsToDipslay  = isset($mavArgs['display'])            ? $mavArgs['display']           : 4;

    // Specific post ids
    $mavPostIn          = isset($mavArgs['post_in'])            ? $mavArgs['post_in']           : '';

    // Post categories
    $mavCategories      = isset($mavArgs['categories'])         ? $mavArgs['categories']        : '';

    // Carousel class
    $mavCarouselClass   = isset($mavArgs['carousel_class'])     ? $mavArgs['carousel_class']    : 'mav-carousel';

    // Carousel item class
    $mavItemClass       = isset($mavArgs['item_class'])         ? $mavArgs['item_class']        : 'mav-carousel-item';

    // Carousel item container class
    $mavContainerClass  = isset($mavArgs['container_class'])    ? $mavArgs['container_class']   : 'mav-carousel-ctn';

    // Carousel wrapper class
    $mavWrapperClass    = isset($mavArgs['wrapper_class'])      ? $mavArgs['wrapper_class']     : 'mav-carousel-wrapper';

    // Carousel nav wrapper class
    $mavNavWrapperClass = isset($mavArgs['nav_wrapper_class'])  ? $mavArgs['nav_wrapper_class'] : 'mav-carousel-nav-wrapper';

    // Carousel nav class
    $mavNavClass        = isset($mavArgs['nav_class'])          ? $mavArgs['nav_class']         : 'mav-carousel-nav';

    // Carousel item content template
    $mavTemplate        = isset($mavArgs['template'])           ? $mavArgs['template']          : 'template-parts/content';

    // Carousel auto slide
    $mavAutoSlide       = isset($mavArgs['auto_slide'])         ? $mavArgs['auto_slide']        : 'true';

    // Carousel slide interval
    $mavInterval        = isset($mavArgs['interval'])           ? $mavArgs['interval']          : 4000;

    // Query arguments
    $mavQueryArgs = array(
        'post_type'                 => $mavPostType,
        'posts_per_page'            => $mavNumberOfPosts,
        'ignore_sticky_posts'       => true,
        'post__in'                  => $mavPostIn,
        'post__not_in'              => array( get_the_ID() ),
        'category__in'              => $mavCategories,
    );

    $mavQuery = new WP_Query($mavQueryArgs);

    if ($mavQuery->have_posts()) {
        printf(
            sprintf('<div id="mavid-carousel-%2$s" data-unique="%2$s" data-total="%3$s" data-display="%4$s" data-current-direction="prev" data-auto-slide="%5$s" data-interval="%6$s" class="%1$s">',
            $mavCarouselClass,
            $mavUniqueNumber,
            $mavNumberOfPosts,
            $mavPostsToDipslay  ,
            $mavAutoSlide,
            $mavInterval)
        );
            printf(
                sprintf('
                <div class="%3$s">
                    <nav data-direction="prev" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s"></nav>
                </div>',
                $mavNavClass,
                $mavUniqueNumber,
                $mavNavWrapperClass)
            );
            printf(
                sprintf('<div class="%1$s">',$mavWrapperClass)
            );
                printf(
                    sprintf('<ul id="mavid-carousel-ctn-%1$s" class="%2$s" data-container="true">',
                    $mavUniqueNumber,
                    $mavContainerClass)
                );

                $i = 1;
                    // The Loop
                    while ($mavQuery->have_posts()):
                        $mavQuery->the_post();
                            printf(
                                sprintf('<li data-item-number="%2$s" data-gutter="" class="%1$s">',
                                $mavItemClass,
                                $i++)
                            );
                            get_template_part( $mavTemplate , get_post_format() );
                            echo '</li>';
                    endwhile;

                echo '</ul>';
            echo '</div>';
            printf(
                sprintf('
                <div class="%3$s">
                    <nav data-direction="next" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s mav-hide"></nav>
                </div>',
                $mavNavClass,
                $mavUniqueNumber,
                $mavNavWrapperClass)
            );
        echo '</div>';
        // Reset post data
        wp_reset_query();
    } else {
        printf(
            sprintf('<div class="mav-flex-center-all"><span>Không có bài nào cùng chuyên mục %1$s</span></div>',
            get_the_category()[0]->name)
        );
    }
}