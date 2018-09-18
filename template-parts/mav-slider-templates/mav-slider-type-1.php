<?php
/**
 * @package mavericktheme
 * Maverick Uni Slider Template - Type 1
 */

$mav_class_slide_item_image_wrapper     = get_query_var( 'mav_class_slide_item_image_wrapper' );
$mav_class_slide_item_image_container   = get_query_var( 'mav_class_slide_item_image_container' );

print('<div>');
    // Slide Item - Feature Image Wrapper
    printf('<div class="%1$s">', $mav_class_slide_item_image_wrapper);
        // Slide Item - Feature Image Container
        printf( '<figure class="%1$s">', $mav_class_slide_item_image_container );
            // Slide Item - Image
            printf( '<img src="%1$s" alt="%2$s">', get_the_post_thumbnail_url( get_the_id(),'full'), get_the_title() );
        echo '</figure>';
    echo '</div>';

    // Slider Item - Title Wrapper
    printf('<div class="mav-slider__slide_title--wrp">');
        // Slider Item - Title Container
        printf('<div class="mav-slider__slide_title--ctn">');
            // Slider Item - Title
            the_title('<h2 class="mav-slider__slide--title">','</h2>');
        echo '</div>';
    echo '</div>';
echo '</div>';