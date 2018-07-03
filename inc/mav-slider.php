<?php
/*
 * @package mavericktheme
 */

function mavf_slider($mavArgs) {
    if (function_exists('mavf_unique')) {
        $mavUniqueNumber = mavf_unique(rand(6,12));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }
    /*
     * Default settings
     */

    // Slider type
    $mavSliderType      = isset($mavArgs['slider_type'])        ? $mavArgs['slider_type']       : 2;
    // Post type
    $mavPostType        = isset($mavArgs['post_type'])          ? $mavArgs['post_type']         : 'post';
    // Number of slides
    $mavNumberOfSlides  = isset($mavArgs['number_of_slides'])   ? $mavArgs['number_of_slides']  : 5;
    // Slider ID
    $mavSliderId        = isset($mavArgs['slider_id'])          ? $mavArgs['slider_id']         : 'mavid-slider-'.$mavSliderType.'-'.$mavUniqueNumber;
    // Slider container class
    $mavSliderContainer = isset($mavArgs['slider_container'])   ? $mavArgs['slider_container']  : 'mav-slider-type-'.$mavSliderType.'-ctn';
    // Slide interval
    $mavInterval        = isset($mavArgs['interval'])           ? $mavArgs['interval']          : 4000;
    // Display post title
    $mavDisplayTitle    = isset($mavArgs['display_title'])      ? $mavArgs['display_title']     : true;
    // Categories
    $mavCategories      = isset($mavArgs['categories'])         ? $mavArgs['categories']        : '';
    // Specific posts
    $mavPosts           = isset($mavArgs['posts'])              ? $mavArgs['posts']             : '';
    // Slider height
    $mavSliderHeight    = isset($mavArgs['height'])             ? 'height: '.$mavArgs['height'].';'  : '';


    if ( $mavSliderType == 1 && $mavNumberOfSlides > 6 ) {
        $mavNumberOfSlides = 6;
    }
    if ( $mavSliderType == 2 && $mavNumberOfSlides > 10 ) {
        $mavNumberOfSlides = 10;
    }
    if ( $mavSliderType == 3 ) {
        $mavNumberOfSlides = 5;
    }

    $mavQueryArgs = array(
        'post_type'             => $mavPostType,
        'post_status'           => 'publish',
        'posts_per_page'        => ($mavNumberOfSlides),
        'post__in'              => $mavPosts,
        'ignore_sticky_posts'   => true,
        'category__in'          => $mavCategories,
        'meta_query'            => array(
                                    array(
                                        'key'        => '_thumbnail_id',
                                        'compare'    => 'EXISTS'
                                    )
                                )
    );

    $mavQuery = new WP_Query($mavQueryArgs);

    if ($mavQuery->have_posts()):
        printf(
            '<section id="%1$s" data-type="%3$s" data-interval="%2$s" data-unique="%4$s" class="mav-slider mav-slider-type-%3$s-wrapper" style="%5$s">',
            $mavSliderId, $mavInterval, $mavSliderType, $mavUniqueNumber, $mavSliderHeight
        );
        printf('<div class="mav-slider-container %1$s">',$mavSliderContainer);

        $i = 1;

        /**
         * Type 1
         */
        if ($mavSliderType == 1) {
            while ($mavQuery->have_posts()):
                $mavQuery->the_post();

                if (function_exists('mavf_get_post_thumbnail_url')) {
                    $mavImageUrl = mavf_get_post_thumbnail_url('large');
                }

                ( $i == 1 ? $mavFirstSlide = ' mav-first-slide' : $mavFirstSlide = '' );

                printf(
                    '<div class="mav-slide mav-slide-number-%2$s %3$s" data-slide="%2$s" %1$s>',
                    $mavImageUrl, $i, $mavFirstSlide
                );
                printf(
                    '<a href="%1$s" class="mav-slide-title">%2$s</a>',
                    get_the_permalink(),get_the_title()
                );
                echo '</div>';
                $i++;
            endwhile;

        } // Slider Type 1

        /**
         * Type 2
         */
        if ($mavSliderType == 2) {
            $mavRandomNumber = $mavUniqueNumber;
            while ($mavQuery->have_posts()):
                $mavQuery->the_post();
                if ($i == 1) {
                    $mavChecked = 'checked';
                    $mavCurrentSlide = ' mav-current-slide';
                    $mavActiveSlide = ' mav-active-slide';
                } else {
                    $mavChecked = '';
                    $mavCurrentSlide = '';
                    $mavActiveSlide = '';
                }

                printf(
                    '<input id="mavid-slide-%1$s-%4$s" type="radio" name="slides" data-number="%1$s" class="mav-slide-input%3$s" %2$s>',
                    $i, $mavChecked, $mavCurrentSlide, $mavRandomNumber
                );

                if (function_exists('mavf_get_post_thumbnail_url')) {
                    $mavImageUrl = mavf_get_post_thumbnail_url('large');
                }

                printf(
                    '<div id="mavid-slide-ctn-%1$s-%4$s" data-slide="%1$s" data-number="%1$s" class="mav-slide%3$s" %2$s>',
                    $i, $mavImageUrl, $mavActiveSlide, $mavRandomNumber
                );

                $mavPrevSlide = $i - 1;
                if ($mavPrevSlide < 1) {
                    $mavPrevSlide = $mavNumberOfSlides;
                }

                // Previous nav
                printf(
                    '<label for="mavid-slide-%1$s-%2$s" data-input="mavid-slide-%1$s-%2$s" data-container="mavid-slide-ctn-%1$s-%2$s" data-number="%1$s" class="mav-slide-nav slide-prev"></label>',
                    $mavPrevSlide, $mavRandomNumber
                );

                if ($mavDisplayTitle) {
                    echo '<div class="mav-slide-post-title-ctn">';
                        printf(
                            '<a href="%2$s" title="Xem %1$s"><h2 class="mav-slider-title">%1$s</h2></a>',
                            get_the_title(), get_the_permalink()
                        );
                    echo '</div>';
                }

                $mavNextSlide = $i + 1;
                if ($mavNextSlide > $mavNumberOfSlides) {
                    $mavNextSlide = 1;
                }

                // Next nav
                printf(
                    '<label for="mavid-slide-%1$s-%2$s" data-input="mavid-slide-%1$s-%2$s" data-container="mavid-slide-ctn-%1$s-%2$s" data-number="%1$s" class="mav-slide-nav slide-next"></label>',
                    $mavNextSlide, $mavRandomNumber
                );
                echo '</div>';

                $i++;
            endwhile;

            // Nav dots
            printf(
                '<div id="mavid-slider-css-nav-%1$s" class="mav-slider-nav">',
                $mavRandomNumber
            );
                for ($j = 1 ; $j <= $mavNumberOfSlides ; $j++) {
                    if ($j==1){
                        $mavActiveDot = ' mav-active-dot';
                    } else {
                        $mavActiveDot = '';
                    }
                    printf(sprintf('<label id="mavid-dot-%1$s-%3$s" for="mavid-slide-%1$s-%3$s" data-input="mavid-slide-%1$s-%3$s" data-container="mavid-slide-ctn-%1$s-%3$s" class="mav-nav-dot%2$s"></label>',
                    $j,
                    $mavActiveDot,
                    $mavRandomNumber));
                }
            echo '</div>';
        } // slider Type 2

        /**
         * Type 3
         */
        if ($mavSliderType == 3) {
            while ($mavQuery->have_posts()):
                $mavQuery->the_post();

                $mavTitle = get_the_title();
                $mavPermalink = get_the_permalink();

                if (function_exists('mavf_get_post_thumbnail_url')) {
                    $mavImageUrl = mavf_get_post_thumbnail_url('large');
                }
                printf(
                    '<div id="mavid-slide-type-3-%2$s" data-number="%2$s" class="mav-slide" %1$s>',
                    $mavImageUrl, $i
                );
                printf(
                    '<div id="mavid-slide-type-3-title-%1$s" data-number="%1$s" class="mav-slide-title-ctn mav-hide-on-mobile">',
                    $i
                );
                printf(
                    '<a href="%2$s" title="Xem %1$s"><h2>%1$s</h2></a>',
                    $mavTitle, $mavPermalink
                );
                echo '</div>';
                printf(
                    '<div class="mav-slide-title-ctn mav-hide-on-desktop"><a href="%2$s" title="Xem %1$s" class="mav-btn-solid">Xem chi tiết</a></div>',
                    $mavTitle, $mavPermalink
                );
                echo '</div>';
                $i++;
            endwhile;
        } // Slider Type 3
        echo '</div>';
        echo '</section>';
    endif;
    wp_reset_postdata();
}