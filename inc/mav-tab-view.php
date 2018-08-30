<?php
/**
 * @package maverick-theme
 */

/**
 * Tabbed Post
 *
 * @param [type] $mav_args
 * @return void
 */

function mavf_tabbed_posts($mav_args)
{
    $mav_query_args = isset( $mav_args['query_args'] ) ? $mav_args['query_args'] : array();

    if ( empty( $mav_query_args ) ) {
        return;
    }

    $mav_vertical       = isset( $mav_args['vertical'] )                        ? 'data-vertical'                           : '';
    $mav_plain          = isset( $mav_args['plain'] ) && empty( $mav_vertical ) ? 'data-plain'                              : '';
    $mav_number_of_post = isset( $mav_args['query_args']['posts_per_page'] )    ? $mav_args['query_args']['posts_per_page'] : 5;

    $mav_areas = '';

    if ( empty( $mav_vertical ) ) {
        // Horizontal layout
        $mav_trigger = array();
        $mav_body    = array();

        for ( $i = 1; $i <= $mav_number_of_post; $i++ ) {
            array_push( $mav_trigger, 'trigger' );
            array_push( $mav_body, 'content' );
        }
        $mav_areas = "'".implode( $mav_trigger, " " )."' '".implode( $mav_body, " " )."'";
    } else {
        // Vertical layout
        for ( $i = 1; $i <= $mav_number_of_post; $i++ ) {
            $mav_areas .= "'trigger content' ";
        }
    }

    $mav_query = new WP_Query( $mav_query_args );

    if ( $mav_query->have_posts() ) :
        printf( '<div class="mav-tab-wrapper" %1$s>', $mav_plain );
            printf( '<div class="mav-tab-ctn" style="grid-template-areas: %1$s" %2$s>', $mav_areas, $mav_vertical );
                $mav_state = 'data-state="active"';
                while ( $mav_query->have_posts() ) :
                    $mav_query->the_post();
                    // Trigger
                    printf( '<div class="mav-tab-trigger" %1$s>', $mav_state );
                        printf( '<span class="mav-tab-trigger-title">%1$s</span>', get_the_title() );
                    echo '</div>';
                    // Content
                    printf( '<div class="mav-tab-content-wrapper" %1$s>', $mav_state );
                        printf( '<div class="mav-tab-content-ctn mav-post-content">' );
                            the_content();
                        echo '</div>';
                    echo '</div>';
                    $mav_state = 'data-state="inactive"';
                endwhile;
                // Reset post data
                wp_reset_query();
            echo '</div>';
        echo '</div>';
    endif;
}
