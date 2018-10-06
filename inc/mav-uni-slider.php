<?php
/**
 * @package mavericktheme
 * Maverick Uni Slider
 */

function mavf_uni_slider( $mav_args )
{
    // Thông báo lỗi và thoát khỏi chức năng,
    // nếu các thông số truy vấn dữ liệu cần thiết không được cung cấp.
    // Thông báo lỗi ra Console.
    if ( ! isset( $mav_args['query_args'] ) ) {
        if ( function_exists('mavf_console_error') ) {
            $mavErrorMessage = __('Uni Slider - Error message: No argmument provided. Slider can not be initialize.', 'mavericktheme');
            mavf_console_error( $mavErrorMessage );
        }
        return;
    }

    // Slider class for javascript to function
    // Default: mavjs-uni-slider
    $mav_class_slider_js = isset( $mav_args['class_slider_js'] ) ? $mav_args['class_slider_js'] : 'mavjs-uni-slider';

    // Slider Class - Wrapper
    // Default: mav-slider__wrp
    $mav_class_slider_wrapper = isset( $mav_args['class_slider_wrapper'] ) ? $mav_args['class_slider_wrapper'] : 'mav-slider__wrp';

    // Slider Class - Container
    // Default: mav-slider__ctn
    $mav_class_slider_container = isset( $mav_args['class_slider_container'] ) ? $mav_args['class_slider_container'] : 'mav-slider__ctn';

    // Slider Class - Slides Wrapper
    // Default: mav-slider__slides--wrp
    $mav_class_slides_wrapper = isset( $mav_args['class_slides_wrapper'] ) ? $mav_args['class_slides_wrapper'] : 'mav-slider__slides--wrp';

    // Slider Class - Slides Container
    // Default: mav-slider__slides--ctn
    $mav_class_slides_container = isset( $mav_args['class_slides_container'] ) ? $mav_args['class_slides_container'] : 'mav-slider__slides--ctn';

    // Slider Class - Slide Item Wrapper
    $mav_class_slide_item_wrapper = isset( $mav_args['class_slide_item_wrapper'] ) ? $mav_args['class_slide_item_wrapper'] : 'mav-slider__slide--wrp';

    // Slider Class - Slide Item Container
    $mav_class_slide_item_container = isset( $mav_args['class_slide_item_container'] ) ? $mav_args['class_slide_item_container'] : 'mav-slider__slide--ctn';

    // Slider Class - Slide Item Image Wrapper
    $mav_class_slide_item_image_wrapper = isset( $mav_args['class_slide_item_image_wrapper'] ) ? $mav_args['class_slide_item_image_wrapper'] : 'mav-slider__slide__image--wrp';
    set_query_var( 'mav_class_slide_item_image_wrapper', $mav_class_slide_item_image_wrapper );

    // Slider Class - Slide Item Image Container
    $mav_class_slide_item_image_container = isset( $mav_args['class_slide_item_image_container'] ) ? $mav_args['class_slide_item_image_container'] : 'mav-slider__slide__image--ctn';
    set_query_var( 'mav_class_slide_item_image_container', $mav_class_slide_item_image_container );

    // Slider Class - Slide Item Title Wrapper
    $mav_class_slide_item_title_wrapper = isset( $mav_args['class_slide_item_title_wrapper'] ) ? $mav_args['class_slide_item_title_wrapper'] : 'mav-slider__slide__title--wrp';
    set_query_var( 'mav_class_slide_item_title_wrapper', $mav_class_slide_item_title_wrapper );

    // Slider Class - Slide Item Title Container
    $mav_class_slide_item_title_container = isset( $mav_args['class_slide_item_title_container'] ) ? $mav_args['class_slide_item_title_container'] : 'mav-slider__slide__title--ctn';
    set_query_var( 'mav_class_slide_item_title_container', $mav_class_slide_item_title_container );

    // Slider type
    // Default: Type 1
    $mav_slider_type = isset ( $mav_args['slider_type'] ) ? $mav_args['slider_type'] : '1';
    set_query_var('mav_slider_type', $mav_slider_type);

    // Slide Template
    $mav_slide_template = isset( $mav_args['template'] ) ? $mav_args['template'] : TEMPLATE_DIR.'/template-parts/mav-slider-templates/mav-uni-slider__type--'.$mav_slider_type.'.php';

    // Return if template file not found
    if ( ! file_exists( $mav_slide_template ) ) {
        mavf_console_error('Uni Slider - Error: No slide template found.');
        return;
    }

    // Number of post to display at the same time
    // Default: 1
    $mav_posts_to_display = isset( $mav_args['display'] ) ? $mav_args['display'] : 1;

    // Slider Container Height
    // Default: 50vh
    $mav_slider_height = isset( $mav_args['height'] ) ? $mav_args['height'] : '50vh';

    // Slide Interval
    // Default: 5000
    $mav_slider_interval = isset( $mav_args['interval'] ) ? $mav_args['interval'] : 5000;

    // Display title
    // Default: true
    $mav_display_title = isset( $mav_args['display_title'] ) ? $mav_args['display_title'] : true;
    set_query_var('mav_display_title', $mav_display_title);

    // Display excerpt option
    // Default: false
    $mav_display_excerpt = isset( $mav_args['display_excerpt'] ) ? $mav_args['display_ecerpt'] : false;

    // Display nav button preview
    // Default: true
    $mav_nav_preview = isset ( $mav_args['nav_preview'] ) ? $mav_args['nav_preview'] : true;

    // Display nav dot thumbnail
    // Default: true
    $mav_nav_thumbnail_image = isset( $mav_args['thumbnail_image'] ) ? $mav_args['thumbnail_image'] : 'true';

    // Nav Thumbnail container position
    // Default: outside
    $mav_nav_thumbnail_container_position = isset( $mav_args['thumbnail_position'] ) ? $mav_args['thumbnail_position'] : 'outside';

    // Nav thumbnail size
    // Default: 80px x 50px
    $mav_nav_thumbnail_size = isset( $mav_args['thumbnail_size'] ) ? $mav_args['thumbnail_size'] : array('80px','50px');

    // Display Interval Indicator
    // Default: true
    $mav_slider_indicator = isset( $mav_args['interval_indicator'] ) ? $mav_args['interval_indicator'] : true;

    // Slider background color
    // Default: transparent
    $mav_slider_background_color = isset( $mav_args['background_color'] ) ? $mav_args['background_color'] : 'transparent';

    // Auto slide option
    // Default: true
    $mav_auto_slide = isset( $mav_args['auto_slide'] ) ? $mav_args['auto_slide'] : true;

    // Make A Unique String
    $mav_unique_number = function_exists( 'mavf_unique' ) ? mavf_unique( rand( 6, 12 ) ) : wp_create_nonce( time() );

    // Post query arguments
    $mav_query_args = $mav_args['query_args'];

    // Featured image requirement
    $mav_thumbnail_req = array(
        array(
            'key'        => '_thumbnail_id',
            'compare'    => 'EXISTS'
        )
    );
    // Append featured image requirement to the query
    array_push( $mav_query_args, $mav_query_args['meta_query'] = $mav_thumbnail_req );

    // Total posts
    $mav_total_posts = isset( $mav_query_args['posts_per_page'] ) ? $mav_query_args['posts_per_page'] : get_option( 'posts_per_page' );

    // Init post query
    $mav_query = new WP_Query( $mav_query_args );

    // If total posts option provided is greater than actual post count from the query
    // set total post query equal to actual post count from the query
    if ( $mav_total_posts > $mav_query->post_count ) {
        $mav_total_posts = $mav_query->post_count;
    }

    // If total post number is less than number of posts to display
    // set number of posts to display equal to total post number
    if ( $mav_total_posts < $mav_posts_to_display ) {
        $mav_posts_to_display = $mav_total_posts;
    }

    $mav_hidden = ($mav_total_posts == $mav_posts_to_display) ? 'data-hidden' : '';

    /**
     * Start here
     */

    if ( $mav_query-> have_posts() ) :
        // Slider wrapper
        printf(
            '<div id="mavid-uni-slider-%1$s" class="%2$s %3$s" data-unique="%1$s" data-type="%4$s" data-total-slides="%5$s" data-init-slides-display="%6$s" data-slides-display="%6$s" data-interval="%7$s" data-auto-slide="%8$s" style="background: %9$s;">',
            $mav_unique_number, $mav_class_slider_js, $mav_class_slider_wrapper, $mav_slider_type,
            $mav_total_posts, $mav_posts_to_display, $mav_slider_interval, $mav_auto_slide, $mav_slider_background_color
            );

            // Slider container
            printf( '<div class="%1$s" data-type="%2$s">', $mav_class_slider_container, $mav_slider_type );

                // Slider Loading Indicator
                $mav_show_indicator = $mav_slider_indicator ? '' : 'mav-hide';
                printf(
                    '<div class="mavjs-slider__loading--indicator mav-slider__loading--indicator %2$s" style="animation-duration: %1$s;"></div>',
                    $mav_slider_interval, $mav_show_indicator
                );

                printf('<div>');

                // Slides Wrapper
                printf(
                    '<div class="%2$s" data-unique="%1$s" data-type="%3$s">',
                    $mav_unique_number, $mav_class_slides_wrapper, $mav_slider_type
                    );

                    // Slides container
                    $mav_grid_column_width = 100 / $mav_posts_to_display;
                    $mav_grid_columns = 'grid-template-columns: repeat('. $mav_total_posts .','. $mav_grid_column_width .'%);';
                    printf(
                        '<ul class="mavjs-uni-slider__slides--ctn %1$s" style="%2$s height:%3$s;">',
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
                                    '<li id="mavid-slider-%1$s-item-%5$s" class="mavjs-uni-slider__slide--item %2$s" %3$s title="%4$s">',
                                    $mav_unique_number, $mav_class_slide_item_wrapper, $mav_slide_item_number, get_the_title(), $mav_i
                                    );

                                    // Slide Item - Container
                                    printf( '<div class="%1$s">', $mav_class_slide_item_container );

                                        // Slide Template
                                        include $mav_slide_template;

                                    // End of item container
                                    echo '</div>';

                                // End of item wrapper
                                echo '</li>';

                                // Collect Image Urls for slider nav
                                array_push( $mav_image_urls , get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ) );
                                // Collect Titles for slider nav
                                array_push( $mav_titles, get_the_title() );
                            }

                            $mav_i++;
                        }

                        // Reset post data
                        wp_reset_postdata();

                    // End of Slides Container
                    echo '</ul>';
                echo '</div>';

                // Button Prev
                printf(
                    '<div class="mav-slider__nav__arrow--wrp mav-hide" %3$s data-direction="prev" data-type="%2$s">
                        <div class="mav-slider__nav__arrow--ctn" data-direction="prev" data-type="%2$s">
                            <div class="mavjs-uni-slider__nav--arrow mav-slider__nav--arrow" data-unique="%1$s" data-type="%2$s" data-direction="prev" data-slide-number="1">
                                <div class="mavjs-nav__preview--wrp mav-slider__preview--wrp">
                                    <div class="mavjs-nav__preview--ctn mav-slider__preview--ctn">
                                        <figure>
                                            <img src="" class="mavjs-featured-image mav-slider__nav--image" data-prev>
                                            <figcaption>
                                                <span class="mavjs-title mav-slider__nav_preview--title" data-drection="prev"></span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <span class="mav-slider__nav--icon"><i class="fas fa-chevron-left"></i></span>
                            </div>
                        </div>
                    </div>',
                    $mav_unique_number, $mav_slider_type, $mav_hidden
                );

                // Button Next
                printf(
                    '<div class="mav-slider__nav__arrow--wrp" %3$s data-direction="next" data-type="%2$s">
                        <div class="mav-slider__nav__arrow--ctn" data-direction="next" data-type="%2$s">
                            <div class="mavjs-uni-slider__nav--arrow mav-slider__nav--arrow" data-unique="%1$s" data-type="%2$s" data-direction="next" data-slide-number="1">
                                <span class="mav-slider__nav--icon"><i class="fas fa-chevron-right"></i></span>
                                <div class="mavjs-nav__preview--wrp mav-slider__preview--wrp">
                                    <div class="mavjs-nav__preview--ctn mav-slider__preview--ctn">
                                        <figure>
                                            <img src="" class="mavjs-featured-image mav-slider__nav--image" data-next>
                                            <figcaption>
                                                <span class="mavjs-title mav-slider__nav_preview--title" data-drection="next"></span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>',
                    $mav_unique_number, $mav_slider_type, $mav_hidden
                );

                echo '</div>';

                // Slider Thumbnail Nav Wrapper
                printf(
                    '<div class="mav-slider__nav--wrapper" data-unique="%1$s" data-type="%2$s" %3$s>',
                    $mav_unique_number, $mav_slider_type, $mav_hidden
                    );
                    // Slider Thumbnail Nav Container
                    printf(
                        '<nav class="mav-slider__nav--ctn" data-position="%1$s">',
                        $mav_nav_thumbnail_container_position
                        );
                        // Thumbnail Dot Container
                        printf( '<ul class="mavjs-uni-slider__nav__dots--ctn mav-slider__nav__dots--ctn">' );
                            $mav_show_thumbnail = !$mav_nav_thumbnail_image ? 'mav-hide' : '';
                            for ( $i = 1; $i < $mav_i; $i++ ) {
                                printf(
                                    '
                                    <li id="mavid-uni-slider-%1$s-nav-dot-%2$s" class="mavjs-uni-slider__nav--dot mav-slider__nav--dot" data-slide-number="%2$s" title="%3$s" style="width: %5$s; height: %6$s;">
                                        <img class="%7$s" src="%4$s">
                                    </li>
                                    ',
                                    $mav_unique_number, $i, $mav_titles[$i-1], $mav_image_urls[$i-1], $mav_nav_thumbnail_size[0], $mav_nav_thumbnail_size[1], $mav_show_thumbnail
                                    );
                            }
                        echo '</ul>';
                    echo '</nav>';
                echo '</div>';

            // End of slider container
            echo '</div>';

        // End of slider wrapper
        echo '</div>';
    endif;
}
