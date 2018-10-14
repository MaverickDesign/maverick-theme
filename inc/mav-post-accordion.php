<?php
/**
 * @package mavericktheme
 */

/**
 * Post Accordion
 *
 * @param [array] $mav_args
 * @return void
 */

function mavf_post_accordion( $mav_args )
{

    $mav_query_args = isset( $mav_args['query_args'] ) ? $mav_args['query_args'] : array();

    if ( empty( $mav_query_args ) ) {
        return;
    }

    // Generate unique number
    $mav_unique_number = function_exists( 'mavf_unique' ) ? mavf_unique( rand( 4, 16 ) ) : wp_create_nonce( time() );
    $mav_collection = isset( $mav_args['collection'] ) ? $mav_args['collection'] : false;
    $mav_removable = isset( $mav_args['removable'] ) ? $mav_args['removable'] : false;
    $mav_container_removable = $mav_removable ? 'mavjs-close' : '';
    $mav_faq_data = isset( $mav_args['faq'] ) ? 'data-faq' : '';
    $mav_query = new WP_Query( $mav_query_args );

    if ( $mav_query->have_posts() ) :
        // Collection wrapper
        if ( $mav_collection == true ) {
            printf( '<div id="mavid-accordion-collection-%1$s" class="mav-accordion-collection-wrapper" data-collection="%1$s">', $mav_unique_number );
                printf('<div class="mav-accordion-collection-ctn">');
        }

            while ( $mav_query->have_posts() ) :
                // Prepare post data
                $mav_query->the_post();
                printf( '<div class="mav-accordion-wrapper %1$s" data-level="1">', $mav_container_removable );
                    printf('<div class="mav-accordion-ctn">');

                        printf(
                            '<div class="mavjs-accordion__trigger mav-accordion-trigger" data-trigger-icon data-state="close" data-collection="%1$s" %3$s title="%2$s">',
                            $mav_unique_number, __( 'Click to expand', 'mavericktheme' ), $mav_faq_data.' data-question'
                        );
                            the_title('<span class="mav-accordion-trigger-title mav-accordion__title">','</span>');
                            if ( $mav_removable ) {
                                printf( '<span class="mav-btn-close" title="%1$s"></span>', __('Click to remove', 'mavericktheme') );
                            }
                        echo '</div>';
                        printf('<div class="mav-accordion-ctn-wrapper mav-post-content-wrapper" %1$s>', $mav_faq_data.' data-answer');
                            printf('<div class="mav-accordion-ctn mav-post-content-ctn">');
                                printf('<div class="mav-post-content">');
                                    the_content();
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            endwhile;

            // Reset post data
            wp_reset_postdata();

        if ( $mav_collection == true ) {
                // Collectiob wrapper
                echo '</div>';
            // Collection container
            echo '</div>';
        }
    endif;
}
