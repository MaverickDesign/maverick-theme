<?php
/**
 * @package mavericktheme
 */

/**
 * Post Query
 *
 * @param [array] $mav_args
 * @return void
 */

function mavf_post_query( $mav_args )
{
    // Return if empty query arguments
    if ( empty( $mav_args['query_args'] ) ) {
        return;
    }

    $mav_unique_number = function_exists( 'mavf_unique' ) ? mavf_unique( rand( 4, 16 ) ) : wp_create_nonce( time() );

    /**
     * Default settings
     */

    $mav_template           = isset( $mav_args['template'] )          ? $mav_args['template']         : '/template-parts/mav-card';
    $mav_posts_wrapper      = isset( $mav_args['wrapper'] )           ? $mav_args['wrapper']          : true;
    $mav_posts_container    = isset( $mav_args['container'] )         ? $mav_args['container']        : true;
    $mav_class_wrapper      = isset( $mav_args['class_wrapper'] )     ? $mav_args['class_wrapper']    : 'mav-posts-wrapper';
    $mav_styles_wrapper     = isset( $mav_args['styles_wrapper'] )    ? $mav_args['styles_wrapper']   : '';
    $mav_class_container    = isset( $mav_args['class_container'] )   ? $mav_args['class_container']  : 'mav-posts-ctn';
    $mav_styles_container   = isset( $mav_args['styles_container'] )  ? $mav_args['styles_container'] : '';

    // Query arguments
    $mav_query_args = $mav_args['query_args'];

    $mav_query = new WP_Query( $mav_query_args );

    // The Loop
    if ( $mav_query->have_posts() ) :
        // Wrapper & Container
        if ( $mav_posts_wrapper ) {
            // Wrapper
            printf(
                '<div class="%1$s" style="%2$s" data-unique-id="%3$s">',
                $mav_class_wrapper, $mav_styles_wrapper, $mav_unique_number
            );
            if ( $mav_posts_container ) {
                // Container
                printf(
                    '<div class="%1$s" style="%2$s">',
                    $mav_class_container, $mav_styles_container
                );
            }
        }

        while ( $mav_query->have_posts() ) :
            $mav_query->the_post();
            get_template_part( $mav_template, get_post_format() );
        endwhile;
        wp_reset_postdata();

        // End of Wrapper & Container
        if ( $mav_posts_wrapper ) {
            if ( $mav_posts_container ) {
                // Container
                echo '</div>';
            }
            // Wrapper
            echo '</div>';
        }
    endif;
}
