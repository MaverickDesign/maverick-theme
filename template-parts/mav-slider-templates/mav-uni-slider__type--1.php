<?php
/**
 * @package mavericktheme
 * Maverick Uni Slider Default Template
 * Type 1
 */

$mav_slider_type                        = 'data-type="'.get_query_var( 'mav_slider_type' ).'"';
$mav_class_slide_item_image_wrapper     = get_query_var( 'mav_class_slide_item_image_wrapper' );
$mav_class_slide_item_image_container   = get_query_var( 'mav_class_slide_item_image_container' );
$mav_display_title                      = get_query_var( 'mav_display_title' );

$mav_permalink                          = get_permalink();
$mav_title                              = get_the_title();

// Slide Content Wrapper
printf('<article class="mav-uni-slider__slide_content--wrp">');
    // Slide Content Container
    printf('<div class="mav-uni-slider__slide_content--ctn">');

        if ( $mav_display_title ) {
            // Slide Title Wrapper
            printf( '<div class="mav-slider__slide_title--wrp" %1$s>', $mav_slider_type );
                // Slide Title Container
                printf('<div class="mav-slider__slide_title--ctn">');
                    // Slide Title
                    printf(
                        '<h2 class="mav-slider__slide--title"><a href="%2$s">%1$s</a></h2>',
                        $mav_title, $mav_permalink
                        );
                echo '</div>';
            echo '</div>';
        }

        // Read more button
        printf( '<div class="mav-slider__button--wrp" %1$s>', $mav_slider_type );
            printf(
                '<button class="mav-btn__primary"><a href="%2$s">%1$s</a></button>',
                __( 'Xem chi tiết', 'mavericktheme' ), $mav_permalink
                );
        echo '</div>';

        // Slide Feature Image Wrapper
        printf(
            '<div class="%1$s" %2$s>', $mav_class_slide_item_image_wrapper, $mav_slider_type
            );
            // Slide Feature Image Container
            printf( '<figure class="%1$s">', $mav_class_slide_item_image_container );
                // Slide Feature Image
                printf( '<img src="%1$s" alt="%2$s">', get_the_post_thumbnail_url( get_the_id(),'full'), $mav_title );
            echo '</figure>';
        echo '</div>';

    echo '</div>';
echo '</article>';