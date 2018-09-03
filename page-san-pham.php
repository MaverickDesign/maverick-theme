<?php
/**
 * @package mavericktheme
 * Template Name: Sản phẩm
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main" class="mav-page-wrapper">
    <div class="mav-page-ctn">
        <!-- Page Header -->
        <?php get_template_part( 'template-parts/mav-page__header' ); ?>

        <!-- Page Content -->
        <section id="mavid-page-content" class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <?php
                    $mav_args = array (
                        'post_type'             => 'mav_cpt_portfolio',
                        'post_status'           => 'publish',
                        'ignore_sticky_posts'   => 1,
                        'paged'                 =>  get_query_var( 'paged' ),
                        'orderby'               => 'date'
                    );

                    $mav_query = new WP_Query( $mav_args );

                    if ( $mav_query->have_posts() ) {
                        printf('<section id="mavid-post-index" class="mav-post-index-wrapper">');
                            $mavColumns = ( get_option( 'mav_setting_blog_page_columns' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_columns' ) ) : '4';
                            printf(
                                '<div id="mavid-posts-container" class="mav-post-index-ctn mav-grid-col-%1$s" style="grid-gap: var(--mav-gutter-lg);">',
                                $mavColumns
                            );
                                while ( $mav_query->have_posts() ) {
                                    $mav_query->the_post();
                                    get_template_part( 'template-parts/mav-card-cpt-portfolio' );
                                }
                                wp_reset_postdata();
                            echo '</div>';

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
                        echo '</section>';
                    }
                ?>
            </div>
        </section>
        <!-- Page Footer -->
        <!-- <footer id="mavid-page-footer" class="mav-page-footer mav-page-footer-wrapper">
        </footer> -->
    </div>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>