<?php
/**
 * @package mavericktheme
 */

function mavf_carousel( $mav_args )
{
    // Thông báo lỗi và thoát khỏi chức năng,
    // nếu các thông số truy vấn dữ liệu cần thiết không được cung cấp.
    // Thông báo lỗi ra Console.
    if ( ! isset( $mav_args['query_args'] ) ) {
        if ( function_exists('mavf_console_error') ) {
            $mavErrorMessage = __('Carousel - Error message: No argmument provided. Carousel can not be initialize.', 'mavericktheme');
            mavf_console_error( $mavErrorMessage );
        }
        return;
    }

    // Post Queries
    $mav_post_queries = isset( $mav_args['query_args'] ) ? $mav_args['query_args'] : array();

    // Create unique number
    $mav_unique_number = function_exists( 'mavf_unique' ) ? mavf_unique( rand( 6, 12 ) ) : wp_create_nonce( time() );

    // Post type
    $mav_post_type = isset( $mav_args['post_type'] ) ? $mav_args['post_type'] : 'post';

    // Number of posts to query
    $mav_number_of_posts   = isset( $mav_post_queries['posts_per_page'] ) ? $mav_post_queries['posts_per_page'] : 5;

    // Number of posts to display
    $mav_posts_to_display  = isset( $mav_args['display'] ) ? $mav_args['display'] : 4;

    // Carousel class
    $mav_carousel_class   = isset( $mav_args['carousel_class'] ) ? $mav_args['carousel_class'] : 'mav-carousel';

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
    $mav_template        = isset($mav_args['template']) ? $mav_args['template'] : 'template-parts/mav-card';

    // Auto slide
    $mav_auto_slide = isset( $mav_args['auto_slide'] ) ? $mav_args['auto_slide'] : 'true';

    // Interval
    // Default: 5000
    $mav_interval = isset( $mav_args['interval'] ) ? $mav_args['interval'] : 5000;

    // Show nav
    // Default: True
    $mav_show_nav = isset( $mav_args['show_nav'] ) ? $mav_args['show_nav'] : true;

    // Query arguments
    $mav_query_args = $mav_post_queries;

    $mav_query = new WP_Query( $mav_query_args );

    if ( $mav_number_of_posts > $mav_query->post_count ) {
        $mav_number_of_posts = $mav_query->post_count;
    }

    if ( $mav_posts_to_display > $mav_query->post_count ) {
        $mav_posts_to_display = $mav_query->post_count;
    }

    if ( $mav_query->have_posts() ) :
        printf(
            '<div id="mavid-carousel-%2$s" data-unique="%2$s" data-total="%3$s" data-display="%4$s" data-current-direction="prev" data-auto-slide="%5$s" data-interval="%6$s" class="%1$s">',
            $mav_carousel_class, $mav_unique_number, $mav_number_of_posts, $mav_posts_to_display, $mav_auto_slide, $mav_interval
            );

            $mav_hidden = $mav_show_nav ? '' : 'data-hidden';

            // Button Prev
            printf(
                '<div class="%3$s" %4$s>
                    <nav data-direction="prev" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s"></nav>
                </div>',
                $mav_nav_class, $mav_unique_number, $mav_nav_wrapper_class, $mav_hidden
            );

            // Items Wrapper
            printf( '<div class="%1$s">', $mav_wrapper_class );
                // Items Container
                printf(
                    '<ul id="mavid-carousel-ctn-%1$s" class="%2$s" data-container="true">',
                    $mav_unique_number, $mav_container_class
                    );

                    $i = 1;

                    // The Loop
                    while ( $mav_query->have_posts() ) :
                        $mav_query->the_post();
                        // Carousel Item
                        printf( '<li data-item-number="%2$s" data-gutter="" class="%1$s">', $mav_item_class, $i++ );
                            get_template_part( $mav_template, get_post_type() );
                        echo '</li>';
                    endwhile;

                    // Reset post data
                    wp_reset_postdata();

                // End of Items Container
                echo '</ul>';
            echo '</div>';

            // Button Next
            printf(
                '<div class="%3$s" %4$s>
                    <nav data-direction="next" data-current-direction="prev" data-current-step="0" data-unique="%2$s" class="%1$s mav-hide"></nav>
                </div>',
                $mav_nav_class, $mav_unique_number, $mav_nav_wrapper_class, $mav_hidden
            );

        echo '</div>';
    endif;
}