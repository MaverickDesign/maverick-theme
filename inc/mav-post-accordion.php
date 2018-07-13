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
    $mavHasCollection   = isset($mavArgs['collection'])         ? $mavArgs['collection']        : false;

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
        }
            while ($mavQuery->have_posts()):
                // Prepare post data
                $mavQuery->the_post();
                printf('<div class="mav-accordion-wrapper" data-level="1">');
                    printf('<div class="mav-accordion-wrapper-ctn">');
                        printf('<div class="mav-accordion-trigger" data-trigger-icon data-state="close" data-collection="%1$s" title="%2$s">',$mavUniqueNumber,__('Click to expand','maverick-theme'));
                            the_title();
                        echo '</div>';
                        printf('<div class="mav-accordion-ctn-wrapper">');
                            printf('<div class="mav-accordion-ctn mav-post-content">');
                            the_content();
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            endwhile;
        if ($mavHasCollection == true) {
            echo '</div>';
        }
        // Reset post data
        wp_reset_query();
    endif;
}