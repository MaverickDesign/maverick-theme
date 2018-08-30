<?php
/**
 * @package mavericktheme
 */

/**
 * Slider
 *
 * @param [array] $mav_args
 * @return void
 */

function mavf_slider( $mav_args ) {

    // Make unique string
    if ( function_exists( 'mavf_unique' ) ) {
        $mav_unique_number = mavf_unique( rand( 6, 12 ) );
    } else {
        $mav_unique_number = wp_create_nonce( time() );
    }

    /**
     * Default settings
     */

    // Post query arguments
    $mav_post_queries = isset( $mav_args['query_args'] ) ? $mav_args['query_args'] : array();
    // Slider type
    $mav_slider_type = isset( $mav_args['slider_type'] ) ? $mav_args['slider_type'] : 2;
    // Post type
    $mav_post_type = isset( $mav_args['post_type'] ) ? $mav_args['post_type'] : 'post';
    // Number of slides
    $mav_number_of_slides = isset( $mav_args['number_of_slides'] ) ? $mav_args['number_of_slides'] : 5;
    // Slider ID
    $mav_slider_id = isset( $mav_args['slider_id'] ) ? $mav_args['slider_id'] : 'mavid-slider-'.$mav_slider_type.'-'.$mav_unique_number;
    // Slider container class
    $mav_slider_container = isset( $mav_args['slider_container'] ) ? $mav_args['slider_container'] : 'mav-slider-type-'.$mav_slider_type.'-ctn';
    // Slide interval
    $mav_interval = isset( $mav_args['interval'] ) ? $mav_args['interval'] : 4000;
    // Display post title
    $mav_display_title = isset( $mav_args['display_title'] ) ? $mav_args['display_title'] : true;
    // Categories
    $mav_categories = isset( $mav_args['categories'] ) ? $mav_args['categories'] : '';
    // Specific posts
    $mav_posts = isset( $mav_args['posts'] ) ? $mav_args['posts'] : '';
    // Slider height
    $mav_slider_height = isset( $mav_args['height'] ) ? 'height: '.$mav_args['height'].';' : '';


    // Set max slides for slider type 1
    if ( $mav_slider_type == 1 && $mav_number_of_slides > 6 ) {
        $mav_number_of_slides = 6;
    }
    // Set max slides for slider type 2
    if ( $mav_slider_type == 2 && $mav_number_of_slides > 10 ) {
        $mav_number_of_slides = 10;
    }
    // Set max slides for slider type 3
    if ( $mav_slider_type == 3 ) {
        $mav_number_of_slides = 5;
    }

    // ==========

    $mav_query_args = array();

    if ( !empty( $mav_post_queries ) ) {
        $mav_query_args = $mav_post_queries;
    } else {
        $mav_query_args = array(
            'post_type'             => $mav_post_type,
            'post_status'           => 'publish',
            'posts_per_page'        => $mav_number_of_slides,
            'post__in'              => $mav_posts,
            'ignore_sticky_posts'   => true,
            'category__in'          => $mav_categories,
            'meta_query'            => array(
                                        array(
                                            'key'        => '_thumbnail_id',
                                            'compare'    => 'EXISTS'
                                        )
                                    )
        );
    }

    $mav_query = new WP_Query( $mav_query_args );

    // The Loop
    if ( $mav_query->have_posts() ) :
        // Slider Wrapper
        printf(
            '<div id="%1$s" data-type="%3$s" data-interval="%2$s" data-unique="%4$s" class="mav-slider mav-slider-type-%3$s-wrapper" style="%5$s">',
            $mav_slider_id, $mav_interval, $mav_slider_type, $mav_unique_number, $mav_slider_height
        );
        // Element style
        $mav_element_styles = ( $mav_slider_type == 1 ) ? 'style="grid-template-columns: repeat('.( $mav_number_of_slides - 1 ).',1fr);"' : '';
            // Slider Container
            printf(
                '<div class="mav-slider-container %1$s" %2$s>',
                $mav_slider_container, $mav_element_styles
            );

                $i = 1;

                /**
                 * Type 1
                 * ==================================================
                 */
                if ( $mav_slider_type == 1 ) {
                    while ( $mav_query->have_posts() ) :
                        $mav_query->the_post();

                        if ( function_exists( 'mavf_get_post_thumbnail_url' ) ) {
                            $mav_image_url = mavf_get_post_thumbnail_url( 'large' );
                        }
                        $mav_first_slide = ( $i == 1 ) ? ' mav-first-slide' : '';
                        // ( $i == 1 ? $mav_first_slide = ' mav-first-slide' : $mav_first_slide = '' );

                        printf(
                            '<div class="mav-slide mav-slide-number-%2$s %3$s" data-slide="%2$s" %1$s>',
                            $mav_image_url, $i, $mav_first_slide
                        );
                        printf(
                            '<a href="%1$s" class="mav-slide-title">%2$s</a>',
                            get_the_permalink(), get_the_title()
                        );
                        echo '</div>';

                        $i++;
                    endwhile;

                    // Reset post data
                    wp_reset_postdata();
                }

                /**
                 * Type 2
                 * ==================================================
                 */
                if ( $mav_slider_type == 2 ) {
                    $mav_random_number = $mav_unique_number;
                    while ( $mav_query->have_posts() ) :
                        $mav_query->the_post();
                        if ( $i == 1 ) {
                            $mav_checked        = 'checked';
                            $mav_current_slide  = ' mav-current-slide';
                            $mav_active_slide   = ' mav-active-slide';
                        } else {
                            $mav_checked        = '';
                            $mav_current_slide  = '';
                            $mav_active_slide   = '';
                        }

                        printf(
                            '<input id="mavid-slide-%1$s-%4$s" type="radio" name="slides" data-number="%1$s" class="mav-slide-input%3$s" %2$s>',
                            $i, $mav_checked, $mav_current_slide, $mav_random_number
                        );

                        if ( function_exists( 'mavf_get_post_thumbnail_url' ) ) {
                            $mav_image_url = mavf_get_post_thumbnail_url( 'large' );
                        }

                        printf(
                            '<div id="mavid-slide-ctn-%1$s-%4$s" data-slide="%1$s" data-number="%1$s" class="mav-slide%3$s" %2$s>',
                            $i, $mav_image_url, $mav_active_slide, $mav_random_number
                        );

                        $mav_prev_slide = $i - 1;

                        if ( $mav_prev_slide < 1 ) {
                            $mav_prev_slide = $mav_number_of_slides;
                        }

                        // Previous nav
                        printf(
                            '<label for="mavid-slide-%1$s-%2$s" data-input="mavid-slide-%1$s-%2$s" data-container="mavid-slide-ctn-%1$s-%2$s" data-number="%1$s" class="mav-slide-nav slide-prev"></label>',
                            $mav_prev_slide, $mav_random_number
                        );

                        if ( isset( $mav_display_title ) ) {
                            echo '<div class="mav-slide-post-title-ctn">';
                                printf(
                                    '<a href="%2$s" title="%3$s %1$s"><h2 class="mav-slider-title">%1$s</h2><button class="mav-btn-primary mav-hide-on-desktop mav-hide-on-tablet">%3$s</button></a>',
                                    get_the_title(), get_the_permalink(), __( 'Xem nội dung', 'mavericktheme' )
                                );
                            echo '</div>';
                        }

                        $mav_next_slide = $i + 1;
                        if ( $mav_next_slide > $mav_number_of_slides ) {
                            $mav_next_slide = 1;
                        }

                        // Next nav
                        printf(
                            '<label for="mavid-slide-%1$s-%2$s" data-input="mavid-slide-%1$s-%2$s" data-container="mavid-slide-ctn-%1$s-%2$s" data-number="%1$s" class="mav-slide-nav slide-next"></label>',
                            $mav_next_slide, $mav_random_number
                        );
                        echo '</div>';

                        $i++;
                    endwhile;

                    // Reset post data
                    wp_reset_postdata();

                    // Nav dots
                    printf( '<div id="mavid-slider-css-nav-%1$s" class="mav-slider-nav">', $mav_random_number );
                        for ( $j = 1 ; $j <= $mav_number_of_slides ; $j++ ) {
                            if ( $j == 1 ) {
                                $mav_active_dot = ' mav-active-dot';
                            } else {
                                $mav_active_dot = '';
                            }
                            printf(
                                '<label id="mavid-dot-%1$s-%3$s" for="mavid-slide-%1$s-%3$s" data-input="mavid-slide-%1$s-%3$s" data-container="mavid-slide-ctn-%1$s-%3$s" class="mav-nav-dot%2$s"></label>',
                                $j, $mav_active_dot, $mav_random_number
                            );
                        }
                    echo '</div>';
                }

                /**
                 * Type 3
                 * ==================================================
                 */
                if ( $mav_slider_type == 3 ) {
                    while ( $mav_query->have_posts() ) :
                        $mav_query->the_post();

                        $mav_title = get_the_title();
                        $mav_permalink = get_the_permalink();

                        if ( function_exists( 'mavf_get_post_thumbnail_url' ) ) {
                            $mav_image_url = mavf_get_post_thumbnail_url( 'large' );
                        }
                        printf(
                            '<div id="mavid-slide-type-3-%2$s" data-number="%2$s" class="mav-slide" %1$s>',
                            $mav_image_url, $i
                        );
                            echo '<div class="mav-slide-title-ctn">';
                                printf(
                                    '<a href="%2$s" title="%1$s"><button class="mav-btn-primary-dark">%3$s</button></a>',
                                    $mav_title, $mav_permalink, __( 'Xem chi tiết', 'mavericktheme' )
                                );
                            echo '</div>';
                        echo '</div>';
                        $i++;
                    endwhile;

                    // Reset post data
                    wp_reset_postdata();
                }

            echo '</div>'; // Slider Container
        echo '</div>'; // Slider Wrapper
    endif;
}
