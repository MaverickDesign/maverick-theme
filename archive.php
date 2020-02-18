<?php
/**
 * @package mavericktheme
 */
?>
<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
    <?php
        // Get user setting to show sidebar in blog page
        $mavSidebar = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );

        $mavSectionClass = !$mavSidebar ? 'mav-has-sidebar' : 'mav-site--width';

        printf('<section class="%1$s">', $mavSectionClass);

        // Get default posts per page option
        $mav_posts_per_page = get_option( 'posts_per_page' );
        // Get number of post in the query
        $mav_posts_count = $wp_the_query->post_count;

        // The Loop
        if ( have_posts() ) {
            printf('<section id="mavid-post-index" class="mav-post-index-wrapper">');
                printf(
                    '<div class="mav-post-index-ctn mav-post__index--ctn mav-grid-col-%1$s">',
                    esc_attr( get_option( 'mav_setting_blog_page_columns' ) )
                );
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/mav-card' , get_post_type() );
                    }
                echo '</div>';

                if ( $mav_posts_count >= $mav_posts_per_page ) :
                    // Paginate links
                    echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper">';
                        echo '<div class="mav-paginate-links-ctn">';
                                $mav_args = array(
                                    'prev_text'          => __( 'Trang trước', 'mavericktheme' ),
                                    'next_text'          => __( 'Trang sau', 'mavericktheme' ),
                                    'before_page_number' => '',
                                    'after_page_number'  => ''
                                );
                                echo paginate_links( $mav_args );
                        echo '</div>';
                    echo '</div>';
                endif;

            echo '</section>';
        }

        /**
         * Sidebar widgets
         */
        if ( !$mavSidebar ) {
            get_sidebar();
        }
        echo '</section>';
    ?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>