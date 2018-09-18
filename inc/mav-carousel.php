<?php
/**
 * @package mavericktheme
 */

function mavf_carousel( $mav_args )
{
    if ( function_exists( 'mavf_unique' ) ) {
        $mav_unique_number = mavf_unique( rand(4, 16) );
    } else {
        $mav_unique_number = wp_create_nonce( time() );
    }

    // Post Queries
    $mav_post_queries     = isset($mav_args['query_args'])       ? $mav_args['query_args']      : array();

    // Post type
    $mav_post_type        = isset($mav_args['post_type'])          ? $mav_args['post_type']         : 'post';

    // Number of posts to query
    $mav_number_of_posts   = isset($mav_post_queries['posts_per_page'])    ? $mav_post_queries['posts_per_page']   : 5;

    // Number of posts to display
    $mav_posts_to_display  = isset($mav_args['display'])            ? $mav_args['display']           : 4;

    // Carousel class
    $mav_carousel_class   = isset($mav_args['carousel_class'])     ? $mav_args['carousel_class']    : 'mav-carousel';

    // Carousel item class
    $mav_item_class       = isset($mav_args['item_class'])         ? $mav_args['item_class']        : 'mav-carousel-item';

    // Carousel item container class
    $mav_container_class  = isset($mav_args['container_class'])    ? $mav_args['container_class']   : 'mav-carousel-ctn';

    // Carousel wrapper class
    $mav_wrapper_class    = isset($mav_args['wrapper_class'])      ? $mav_args['wrapper_class']     : 'mav-carousel-wrapper';

    // Carousel nav wrapper class
    $mav_nav_wrapper_class = isset($mav_args['nav_wrapper_class'])  ? $mav_args['nav_wrapper_class'] : 'mav-carousel-nav-wrapper';

    // Carousel nav class
    $mav_nav_class        = isset($mav_args['nav_class'])          ? $mav_args['nav_class']         : 'mav-carousel-nav';

    // Carousel item content template
    $mav_template        = isset($mav_args['template'])           ? $mav_args['template']          : 'template-parts/mav-card';

    // Carousel auto slide
    $mav_auto_slide       = isset($mav_args['auto_slide'])         ? $mav_args['auto_slide']        : 'true';

    // Carousel slide interval
    $mav_interval        = isset($mav_args['interval'])           ? $mav_args['interval']          : 4000;

    // Query arguments
    $mav_query_args = $mav_post_queries;

    $mav_query = new WP_Query( $mav_query_args );

    if ( $mav_query->have_posts() ) {
        printf(
            '<div id="mavid-carousel-%2$s" data-unique="%2$s" data-total="%3$s" data-display="%4$s" data-current-direction="prev" data-auto-slide="%5$s" data-interval="%6$s" class="%1$s">',
            $mav_carousel_class, $mav_unique_number, $mav_number_of_posts, $mav_posts_to_display, $mav_auto_slide, $mav_interval
        );
            printf(
                '<div class="%3$s">
                    <nav data-direction="prev" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s"></nav>
                </div>',
                $mav_nav_class, $mav_unique_number, $mav_nav_wrapper_class
            );
            printf( '<div class="%1$s">', $mav_wrapper_class );
                printf(
                    '<ul id="mavid-carousel-ctn-%1$s" class="%2$s" data-container="true">',
                    $mav_unique_number, $mav_container_class
                );
                    $i = 1;
                    // The Loop
                    while ( $mav_query->have_posts() ) :
                        $mav_query->the_post();
                            printf( '<li data-item-number="%2$s" data-gutter="" class="%1$s">', $mav_item_class, $i++ );
                                get_template_part( $mav_template, get_post_type() );
                            echo '</li>';
                    endwhile;
                    // Reset post data
                    wp_reset_postdata();
                echo '</ul>';
            echo '</div>';

            printf(
                '<div class="%3$s">
                    <nav data-direction="next" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s mav-hide"></nav>
                </div>',
                $mav_nav_class, $mav_unique_number, $mav_nav_wrapper_class
            );
        echo '</div>';
    } else {
        // printf(
        //     '<div class="mav-flex-center-all"><span>%2$s %1$s</span></div>',
        //     get_the_category()[0]->name, __( 'Không có bài nào cùng chuyên mục', 'mavericktheme' )
        // );
        return;
    }
}