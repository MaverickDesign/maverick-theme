<?php
/**
 * @package maverick-theme
 */

function mavf_post_query($mavArgs) {
    // Return if empty query arguments
    if (empty($mavArgs['query_args'])) {
        return;
    }

    if (function_exists('mavf_unique')) {
        $mavUniqueNumber = mavf_unique(rand(4,16));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }

    /**
     * Default settings
     */

    $mavTemplate                = isset($mavArgs['template'])                   ? $mavArgs['template']              : '/template-parts/content';
    $mavPostsWrapper            = isset($mavArgs['wrapper'])                    ? $mavArgs['wrapper']               : true;
    $mavPostsContainer          = isset($mavArgs['container'])                  ? $mavArgs['container']             : true;
    $mavClassWrapper            = isset($mavArgs['class_wrapper'])              ? $mavArgs['class_wrapper']         : 'mav-posts-wrapper';
    $mavStylesWrapper           = isset($mavArgs['styles_wrapper'])             ? $mavArgs['styles_wrapper']        : '';
    $mavClassContainer          = isset($mavArgs['class_container'])            ? $mavArgs['class_container']       : 'mav-posts-ctn';
    $mavStylesContainer         = isset($mavArgs['styles_container'])           ? $mavArgs['styles_container']      : '';

    // Query arguments
    $mavQueryArgs = $mavArgs['query_args'];

    $mavQuery = new WP_Query( $mavQueryArgs );

    // The Loop
    if ($mavQuery->have_posts()):

        if ($mavPostsWrapper) {
            printf( '<div class="%1$s" style="%2$s">', $mavClassWrapper, $mavStylesWrapper ); // Wrapper
            if ($mavPostsContainer) {
                printf( '<div class="%1$s" style="%3$s" data-unique-id="%2$s">', $mavClassContainer, $mavUniqueNumber, $mavStylesContainer ); // Container
            }
        }
            while ($mavQuery->have_posts()):
                $mavQuery->the_post();
                get_template_part( $mavTemplate , get_post_format() );
            endwhile;
        if ($mavPostsWrapper) {
            if ($mavPostsContainer) {
                echo '</div>'; // Container
            }
            echo '</div>'; // Wrapper
        }
        wp_reset_postdata();
    endif;
}