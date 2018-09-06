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

            // Display post (page) content
            if ( $mav_show_page_content ) {
                printf('<div class="mav-pg-ctn">');
                    printf('<div class="mav-center mav-maxw--70 mav-padding-top-bottom-xl">');
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
                'orderby'               => 'date'
            );

            $mav_query = new WP_Query( $mav_args );

            if ( $mav_query->have_posts() ) {

                printf( '<section id="mavid-posts-index" class="mav-post-index-wrapper">' );

                    if ( function_exists('get_field') ) {
                        $mav_columns = get_field('mavcf_page_cpt_layout_columns');
                    }

                    if ( empty( $mav_columns ) ) {
                        $mav_columns = ( get_option( 'mav_setting_blog_page_columns' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_columns' ) ) : '4';
                    }

                    printf(
                        '<div id="mavid-posts-container" class="mav-post-index-ctn mav-grid-col-%1$s" style="grid-gap: var(--mav-gutter-lg);">',
                        $mav_columns
                    );
                        while ( $mav_query->have_posts() ) {
                            $mav_query->the_post();

                            get_template_part( 'template-parts/mav-card', get_post_type() );

                        }
                        // Reset post data
                        wp_reset_postdata();
                    echo '</div>';

                    // Only show when total posts is greater than posts per page setting
                    if ( $mav_query->post_count > get_option('posts_per_page') ) {
                        get_template_part('/template-parts/mav-post-paginate');
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