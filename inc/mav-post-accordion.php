<?php
/**
 * @package maverick-theme
 */

function mavf_post_accordion($mav_args)
{

    if (function_exists('mavf_unique')) {
        $mav_unique_number = mavf_unique(rand(6,12));
    } else {
        $mav_unique_number = wp_create_nonce(time());
    }

    $mavNumberOfPost    = isset($mav_args['number_of_posts'])    ? $mav_args['number_of_posts']   : '1';
    // Collection - true or false
    $mavHasCollection   = isset($mav_args['collection'])         ? $mav_args['collection']        : false;
    // FAQs - true or false
    $mavFAQ             = isset($mav_args['faq'])                ? $mav_args['faq']               : false;

    $mavRemovable       = isset($mav_args['removable'])          ? $mav_args['removable']         : false;

    $mavFAQData         = $mavFAQ ? 'data-faq' : '';

    $mavRemovableContainer = $mavRemovable ? 'mavjs-close' : '';


    $mav_query_args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => $mavNumberOfPost,
        'ignore_sticky_posts'   => true,
        'post__not_in'          => get_option('sticky_posts'),
        'category__in'          => array(5)
    );

    $mav_query = new WP_Query($mav_query_args);

    if ($mav_query->have_posts()) :
        if ($mavHasCollection == true) {
            printf('<div id="mavid-accordion-collection-%1$s" class="mav-accordion-collection-wrapper" data-collection="%1$s">', $mav_unique_number);
                printf('<div class="mav-accordion-collection-ctn">');
        }
            while ($mav_query->have_posts()) :
                // Prepare post data
                $mav_query->the_post();
                printf('<div class="mav-accordion-wrapper %1$s" data-level="1">', $mavRemovableContainer);
                    printf('<div class="mav-accordion-ctn">');
                        printf(
                            '<div class="mav-accordion-trigger" data-trigger-icon data-state="close" data-collection="%1$s" %3$s title="%2$s">',
                            $mav_unique_number, __('Click to expand', 'maverick-theme'), $mavFAQData.' data-question'
                        );
                            the_title('<span class="mav-accordion-trigger-title">','</span>');
                            if ($mavRemovable) {
                                printf('<span class="mav-btn-close" title="%1$s"></span>',__('Click to remove', 'maverick-theme'));
                            }
                        echo '</div>';
                        printf('<div class="mav-accordion-ctn-wrapper" %1$s>', $mavFAQData.' data-answer');
                            printf('<div class="mav-accordion-ctn mav-post-content">');
                                the_content();
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            endwhile;
            // Reset post data
            wp_reset_query();
        if ($mavHasCollection == true) {
                echo '</div>';
            echo '</div>';
        }
    endif;
}