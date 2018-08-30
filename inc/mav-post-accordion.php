<?php
/**
 * @package maverick-theme
 */

/**
 * Post Accordion
 *
 * @param [array] $mav_args
 * @return void
 */

function mavf_post_accordion( $mav_args )
{

    if ( function_exists( 'mavf_unique' ) ) {
        $mav_unique_number = mavf_unique( rand( 6, 12 ) );
    } else {
        $mav_unique_number = wp_create_nonce( time() );
    }

    $mav_number_of_post         = isset( $mav_args['number_of_posts'] )    ? $mav_args['number_of_posts']   : '1';
    $mav_has_collection         = isset( $mav_args['collection'] )         ? $mav_args['collection']        : false;
    $mav_faq                    = isset( $mav_args['faq'] )                ? $mav_args['faq']               : false;
    $mav_removable              = isset( $mav_args['removable'] )          ? $mav_args['removable']         : false;
    $mav_faq_data               = $mav_faq ? 'data-faq' : '';
    $mav_removable_container    = $mav_removable ? 'mavjs-close' : '';

    $mav_query_args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => $mav_number_of_post,
        'ignore_sticky_posts'   => true,
        'post__not_in'          => get_option( 'sticky_posts' ),
        'category__in'          => array(5)
    );

    $mav_query = new WP_Query( $mav_query_args );

    if ( $mav_query->have_posts() ) :
        // Collection wrapper
        if ( $mav_has_collection == true ) {
            printf( '<div id="mavid-accordion-collection-%1$s" class="mav-accordion-collection-wrapper" data-collection="%1$s">', $mav_unique_number );
                printf('<div class="mav-accordion-collection-ctn">');
        }

            while ( $mav_query->have_posts() ) :
                // Prepare post data
                $mav_query->the_post();
                printf( '<div class="mav-accordion-wrapper %1$s" data-level="1">', $mav_removable_container );
                    printf('<div class="mav-accordion-ctn">');
                        printf(
                            '<div class="mav-accordion-trigger" data-trigger-icon data-state="close" data-collection="%1$s" %3$s title="%2$s">',
                            $mav_unique_number, __('Click to expand', 'maverick-theme'), $mav_faq_data.' data-question'
                        );
                            the_title('<span class="mav-accordion-trigger-title">','</span>');
                            if ( $mav_removable ) {
                                printf( '<span class="mav-btn-close" title="%1$s"></span>', __('Click to remove', 'maverick-theme') );
                            }
                        echo '</div>';
                        printf('<div class="mav-accordion-ctn-wrapper" %1$s>', $mav_faq_data.' data-answer');
                            printf('<div class="mav-accordion-ctn mav-post-content">');
                                the_content();
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            endwhile;

            // Reset post data
            wp_reset_postdata();

        if ( $mav_has_collection == true ) {
                // Collectiob wrapper
                echo '</div>';
            // Collection container
            echo '</div>';
        }
    endif;
}
