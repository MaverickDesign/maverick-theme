<?php
/**
 * @package mavericktheme
 */

/**
 * Maverick Uni Slider
 */

function mavf_uni_slider( $mav_args )
{
    if ( ! isset( $mav_args['query_args'] ) ) {
        return;
    }

    // Slider class for javascript to functions
    $mav_class_slider_js
    = isset( $mav_args['class_slider_js'] )
    ? $mav_args['class_slider_js']
    : 'mavjs-uni-slider';

    // Slider Class - Wrapper
    $mav_class_slider_wrapper
    = isset( $mav_args['class_slider_wrapper'] )
    ? $mav_args['class_slider_wrapper']
    : 'mav-slider__wrp';

    // Slider Class - Container
    $mav_class_slider_container
    = isset( $mav_args['class_slider_container'] )
    ? $mav_args['class_slider_container']
    : 'mav-slider__ctn';

    // Slider Class - Slides Wrapper
    $mav_class_slides_wrapper
    = isset( $mav_args['class_slides_wrapper'] )
    ? $mav_args['class_slides_wrapper']
    : 'mav-slider__slides--wrp';

    // Slider Class - Slides Container
    $mav_class_slides_container
    = isset( $mav_args['class_slides_container'] )
    ? $mav_args['class_slides_container']
    : 'mav-slider__slides--ctn';

    // Slider Class - Slide Item Wrapper
    $mav_class_slide_item_wrapper
    = isset( $mav_args['class_slide_item_wrapper'] )
    ? $mav_args['class_slide_item_wrapper']
    : 'mav-slider__slide--wrp';

    // Slider Class - Slide Item Container
    $mav_class_slide_item_container
    = isset( $mav_args['class_slide_item_container'] )
    ? $mav_args['class_slide_item_container']
    : 'mav-slider__slide--ctn';

    // Slider Class - Slide Item Image Wrapper
    $mav_class_slide_item_image_wrapper
    = isset( $mav_args['class_slide_item_image_wrapper'] )
    ? $mav_args['class_slide_item_image_wrapper']
    : 'mav-slider__slide__image--wrp';

    set_query_var( 'mav_class_slide_item_image_wrapper', $mav_class_slide_item_image_wrapper );

    // Slider Class - Slide Item Image Container
    $mav_class_slide_item_image_container
    = isset( $mav_args['class_slide_item_image_container'] )
    ? $mav_args['class_slide_item_image_container']
    : 'mav-slider__slide__image--ctn';

    set_query_var( 'mav_class_slide_item_image_container', $mav_class_slide_item_image_container );

    // Slider Class - Slide Item Title Wrapper
    $mav_class_slide_item_title_wrapper
    = isset( $mav_args['class_slide_item_title_wrapper'] )
    ? $mav_args['class_slide_item_title_wrapper']
    : 'mav-slider__slide__title--wrp';

    set_query_var( 'mav_class_slide_item_title_wrapper', $mav_class_slide_item_title_wrapper );

    // Slider Class - Slide Item Title Container
    $mav_class_slide_item_title_container
    = isset( $mav_args['class_slide_item_title_container'] )
    ? $mav_args['class_slide_item_title_container']
    : 'mav-slider__slide__title--ctn';

    set_query_var( 'mav_class_slide_item_title_container', $mav_class_slide_item_title_container );

    // Slider type
    $mav_slider_type
    = isset ( $mav_args['slider_type'] )
    ? $mav_args['slider_type']
    : 1;

    // Slide Template
    $mav_slide_template
    = isset( $mav_args['template'] )
    ? $mav_args['template']
    : TEMPLATE_DIR.'/template-parts/mav-slider-templates/mav-slider-type-1.php';

    // Return if template file not found
    if ( ! file_exists( $mav_slide_template ) ) {
        return;
    }

    // Number of post to display at the same time
    $mav_posts_to_display
    = isset( $mav_args['display'] )
    ? $mav_args['display']
    : 1;

    // Slider Height
    $mav_slider_height
    = isset( $mav_args['slider_height'] )
    ? $mav_args['slider_height']
    : '50vh';

    // Make A Unique String
    $mav_unique_number
    = function_exists( 'mavf_unique' )
    ? mavf_unique( rand( 6, 12 ) )
    : wp_create_nonce( time() );

    // Post query arguments
    $mav_query_args = $mav_args['query_args'];

    // Total posts
    $mav_total_posts
    = isset( $mav_query_args['posts_per_page'] )
    ? $mav_query_args['posts_per_page']
    : get_option( 'posts_per_page' );

    // Init post query
    $mav_query = new WP_Query( $mav_query_args );

    if ( $mav_query-> have_posts() ) {

        // Slider wrapper
        printf(
            '<div id="mavid-uni-slider-%1$s" class="%2$s %3$s" data-unique="%1$s" data-type="%4$s" data-total-slides="%5$s" data-slides-display="%6$s">',
            $mav_unique_number, $mav_class_slider_js, $mav_class_slider_wrapper, $mav_slider_type, $mav_total_posts, $mav_posts_to_display
        );

            // Slider container
            printf( '<div class="%1$s" data-type="%2$s">', $mav_class_slider_container, $mav_slider_type );

                // Slides Wrapper
                printf(
                    '<div class="%2$s" data-unique="%1$s" data-type="%3$s">',
                    $mav_unique_number, $mav_class_slides_wrapper, $mav_slider_type
                );

                    // Slides container
                    $mav_grid_column_width = 100 / $mav_posts_to_display;
                    $mav_grid_columns = 'grid-template-columns: repeat('. $mav_total_posts .','. $mav_grid_column_width .'%);';

                    printf(
                        '<div class="mavjs-uni-slider__slides--ctn %1$s" style="%2$s height:%3$s;">',
                        $mav_class_slides_container, $mav_grid_columns, $mav_slider_height
                    );

                        $mav_i = 1;
                        $mav_titles = array();
                        $mav_image_urls = array();

                        // The Loop
                        while ( $mav_query->have_posts() ) {
                            $mav_query->the_post();

                            if ( has_post_thumbnail() ) {

                                $mav_slide_item_number = ( $mav_i == 1 ) ? 'data-active-slide data-first-slide data-slide-number="'. $mav_i .'"' : 'data-slide-number="'. $mav_i .'"';

                                // Slide Item - Wrapper
                                printf(
                                    '<div id="mavid-slider-%1$s-item-%5$s" class="mavjs-uni-slider__slide--item %2$s" %3$s title="%4$s">',
                                    $mav_unique_number, $mav_class_slide_item_wrapper, $mav_slide_item_number, get_the_title(), $mav_i
                                );

                                    // Slide Item - Container
                                    printf( '<div class="%1$s">', $mav_class_slide_item_container );

                                        // Slide Template
                                        include $mav_slide_template;

                                        // Collect Image Urls for slider nav
                                        array_push( $mav_image_urls , get_the_post_thumbnail_url( get_the_id(), 'small' ) );
                                        // Collect Titles for slider nav
                                        array_push( $mav_titles, get_the_title() );

                                    // End of item container
                                    echo '</div>';

                                // End of item wrapper
                                echo '</div>';
                            }

                            $mav_i++;
                        }

                        // Reset post data
                        wp_reset_postdata();

                    echo '</div>';
                echo '</div>';

                // Prev Button
                printf(
                    '
                    <div class="mav-slider__nav__arrow--wrp" data-direction="prev" data-type="%2$s">
                        <div class="mav-slider__nav__arrow--ctn" data-direction="prev" data-type="%2$s">
                            <div class="mavjs-slider__nav--arrow mav-slider__nav--arrow" data-unique="%1$s" data-type="%2$s" data-direction="prev" data-slide-number="1" data-current-step="0">
                                <span>Prev</span>
                            </div>
                        </div>
                    </div>
                    ',
                    $mav_unique_number, $mav_slider_type
                );

                // Next Button
                printf(
                    '
                    <div class="mav-slider__nav__arrow--wrp" data-direction="next" data-type="%2$s">
                        <div class="mav-slider__nav__arrow--ctn" data-direction="next" data-type="%2$s">
                            <div class="mavjs-slider__nav--arrow mav-slider__nav--arrow" data-unique="%1$s" data-type="%2$s" data-direction="next" data-slide-number="1" data-current-step="0">
                                <span>Next</span>
                            </div>
                        </div>
                    </div>
                    ',
                    $mav_unique_number, $mav_slider_type
                );

                // Slider nav wrapper
                printf( '<div class="mav-slider__nav--wrapper" data-unique="%1$s" data-type="%2$s">', $mav_unique_number, $mav_slider_type );
                // Slider nav container
                    printf('<div class="mav-slider__nav--ctn">');
                        printf('<ul class="mavjs-slider__nav__dots--ctn mav-slider__nav__dots--ctn">');
                            for ( $i = 1; $i < $mav_i; $i++ ) {
                                printf(
                                    '<li id="mavid-slider-%1$s-nav-dot-%2$s" class="mavjs-slider__nav--dot mav-slider__nav--dot" data-slide-number="%2$s" title="%3$s"><img src="%4$s"></li>',
                                    $mav_unique_number, $i, $mav_titles[$i-1], $mav_image_urls[$i-1]
                                );
                            }
                        echo '</ul>';
                    echo '</div>';
                echo '</div>';

            // End of slider container
            echo '</div>';
        // End of slider wrapper
        echo '</div>';
    }
}