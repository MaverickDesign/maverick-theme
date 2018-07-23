<?php
/**
 * @package maverick-theme
 */

function mavf_post_accordion($mavArgs){

    if (function_exists('mavf_unique')) {
        $mavUniqueNumber = mavf_unique(rand(6,12));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }

    $mavNumberOfPost    = isset($mavArgs['number_of_posts'])    ? $mavArgs['number_of_posts']   : '1';
    // Collection - true or false
    $mavHasCollection   = isset($mavArgs['collection'])         ? $mavArgs['collection']        : false;
    // FAQs - true or false
    $mavFAQ             = isset($mavArgs['faq'])                ? $mavArgs['faq']               : false;

    $mavRemovable       = isset($mavArgs['removable'])          ? $mavArgs['removable']         : false;

    $mavFAQData         = $mavFAQ ? 'data-faq' : '';

    $mavRemovableContainer = $mavRemovable ? 'mavjs-close' : '';


    $mavQueryArgs = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => $mavNumberOfPost,
        'ignore_sticky_posts'   => true,
        'post__not_in'          => get_option('sticky_posts'),
        'category__in'          => array(5)
    );

    $mavQuery = new WP_Query($mavQueryArgs);

    if ($mavQuery->have_posts()):
        if ($mavHasCollection == true) {
            printf('<div id="mavid-accordion-collection-%1$s" class="mav-accordion-collection-wrapper" data-collection="%1$s">',$mavUniqueNumber);
                printf('<div class="mav-accordion-collection-ctn">');
        }
            while ($mavQuery->have_posts()):
                // Prepare post data
                $mavQuery->the_post();
                printf('<div class="mav-accordion-wrapper %1$s" data-level="1">', $mavRemovableContainer);
                    printf('<div class="mav-accordion-ctn">');
                        printf(
                            '<div class="mav-accordion-trigger" data-trigger-icon data-state="close" data-collection="%1$s" %3$s title="%2$s">',
                            $mavUniqueNumber,__('Click to expand','maverick-theme'), $mavFAQData.' data-question'
                        );
                            the_title('<span class="mav-accordion-trigger-title">','</span>');
                            if ($mavRemovable) {
                                printf('<span class="mav-btn-close" title="%1$s"></span>',__( 'Click to remove' , 'maverick-theme' ));
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
        if ($mavHasCollection == true) {
                echo '</div>';
            echo '</div>';
        }
        // Reset post data
        wp_reset_query();
    endif;
}