<?php
/**
 * @package mavericktheme
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php

    /**
     * Sticky posts section
     */

    $mav_sticky_posts = get_option( 'sticky_posts' );

    if ( is_home() && count( $mav_sticky_posts ) > 0 && function_exists( 'mavf_carousel' ) ) {
        $mav_sticky_args = array(
            'post_type'             => 'post',
            'post__in'              => $mav_sticky_posts,
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => 3,
        );
        printf('<div class="mav-blog-sticky-post-wrapper">');
            printf('<div class="mav-blog-sticky-post-ctn">');
                $mav_args = array(
                    'post_queries'  => $mav_sticky_args,
                    'display'       => 3,
                );
                mavf_carousel( $mav_args );
            echo '</div>';
        echo '</div>';
    }

    /**
     * Main Post Loop
     */

    // Get user setting to show sidebar in blog page
    $mavSidebar = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );

    $mav_section_class = $mavSidebar ? 'mav-has-sidebar' : 'mav-site-width';

    printf('<div class="%1$s">', $mav_section_class);

        $mav_args = array (
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'paged'                 =>  get_query_var( 'paged' ),
            'orderby'               => 'date'
        );

        $mav_query = new WP_Query( $mav_args );

        if ( $mav_query->have_posts() ) {
            printf('<section id="mavid-post-index" class="mav-post-index-wrapper">');
                $mavColumns = ( get_option( 'mav_setting_blog_page_columns' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_columns' ) ) : '4';
                /**
                 * Note: "mavjs-posts-container" class is for ajax function, do not remove
                 */
                printf(
                    '<div id="mavid-posts-container" class="mavjs-posts-container mav-post-index-ctn mav-grid-col-%1$s">',
                    $mavColumns
                );
                    while ( $mav_query->have_posts() ) {
                        $mav_query->the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    }
                    wp_reset_postdata();
                echo '</div>';

                // Post Navigation
                if ( esc_attr( get_option( 'mav_setting_ajax_load_posts' ) ) ) {
                    /**
                     * Ajax load more posts
                     */
                    echo '<div class="mav-padding-top-lg">';
                        printf(
                            '<button class="mav-btn-primary-lg mavjs-ajax-load-posts" data-full-width data-ajax-url="%1$s" data-current-page="1" data-action="mavf_ajax_load_posts">%2$s</button>',
                            admin_url('admin-ajax.php'), __('Xem thêm', 'mavericktheme')
                        );
                    echo '</div>';
                } else {
                    /**
                     * Post paginate links
                     */
                    echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper">';
                        echo '<div class="mav-paginate-links-ctn">';
                                $mav_args = array(
                                    'prev_text'          => __('Trang trước', 'mavericktheme'),
                                    'next_text'          => __('Trang sau', 'mavericktheme'),
                                    'before_page_number' => '',
                                    'after_page_number'  => ''
                                );
                                echo paginate_links($mav_args);
                        echo '</div>';
                    echo '</div>';
                }
            echo '</section>';
        }

        /**
         * Sidebar widgets
         */
        if ($mavSidebar) {
            get_sidebar();
        }

    echo '</div>';
?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>