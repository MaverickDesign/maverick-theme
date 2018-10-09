<?php
/**
 * @package mavericktheme
 * Template Name: Custom Post Type
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main" class="mav-page-wrapper">
    <!-- Page Header -->
    <?php get_template_part( 'template-parts/mav-page__header' ); ?>

    <!-- Page Content -->
    <div id="mavid-page-content" class="mav-pg-width">
        <?php

            $mav_show_page_content = false;

            if ( function_exists('get_field') && ! empty( get_field( 'mavcf_page_cpt_content' ) ) ) {
                $mav_show_page_content = true;
            }

            // Display page content
            if ( $mav_show_page_content ) {
                printf('<div class="mav-pg-ctn mav-post-content-wrapper">');
                    printf('<div class="mav-post-content-ctn mav-padding-top-xl">');
                        the_post();
                        the_content();
                    echo '</div>';
                echo '</div>';
            }

            if ( function_exists( 'get_field' ) ) {
                // Custom post type
                $mav_cpt_field = get_field('mavcf_page_cpt');
            } else {
                // Fallback to post
                $mav_cpt_field = 'post';
            }

            $mav_args = array (
                'post_type'             => $mav_cpt_field,
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'paged'                 =>  get_query_var( 'paged' ),
            );

            $mav_query = new WP_Query( $mav_args );

            if ( $mav_query->have_posts() ) {

                printf( '<section id="mavid-post-index" class="mav-post-index-wrapper">' );

                    if ( function_exists( 'get_field' ) ) {
                        $mav_columns = get_field( 'mavcf_page_cpt_layout_columns' );
                    } else {
                        $mav_columns = ( get_option( 'mav_setting_blog_page_columns' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_columns' ) ) : '4';
                    }

                    printf(
                        '<div id="mavid-post-container" class="mav-post-index-ctn mav-grid-col-%1$s" style="grid-gap: var(--mav-gutter);">',
                        $mav_columns
                    );
                        while ( $mav_query->have_posts() ) {
                            $mav_query->the_post();
                            get_template_part( 'template-parts/mav-card', get_post_type() );
                        }
                        // Reset post data
                        wp_reset_postdata();
                    echo '</div>';

                    if ( $mav_query->max_num_pages > 1 ) {
                        echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper">';
                            echo '<div class="mav-paginate-links-ctn">';
                                    $mav_args = array(
                                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                        'total'        => $mav_query->max_num_pages,
                                        'current'      => max( 1, get_query_var( 'paged' ) ),
                                        'format'       => '?paged=%#%',
                                        'show_all'     => false,
                                        'type'         => 'plain',
                                        'end_size'     => 2,
                                        'mid_size'     => 1,
                                        'prev_next'    => true,
                                        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Trang sau', 'mavericktheme' ) ),
                                        'next_text'    => sprintf( '%1$s <i></i>', __( 'Trang trước', 'mavericktheme' ) ),
                                        'add_args'     => false,
                                        'add_fragment' => '',
                                    );
                                    echo paginate_links( $mav_args );
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</section>';
            }
        ?>
    </div>

    <!-- Page Footer -->
    <!-- <footer id="mavid-page-footer" class="mav-page-footer mav-page-footer-wrapper">
    </footer> -->
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>