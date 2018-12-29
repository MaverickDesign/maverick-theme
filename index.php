<?php
/**
 * @package mavericktheme
 * Index Page
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php
    /**
     * Sticky posts section
     * ====================
     */

    // Get option - Display sticky posts section
    $mav_display_sticky_post_section = esc_attr( get_option( 'mav_setting_blog_page_sticky_post_section' ) );

    if ( !$mav_display_sticky_post_section ) :

        $mav_sticky_posts = get_option( 'sticky_posts' ) ;

        if ( is_home() && count( $mav_sticky_posts ) > 0 && function_exists( 'mavf_carousel' ) )
        {
            $mav_sticky_args = array(
                'post_type'             => 'post',
                'post__in'              => get_option( 'sticky_posts' ),
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => 3,
            );

            printf( '<div class="mav-blog-sticky-post-wrapper mav-blog__sticky_posts--wrp">' );
                printf( '<div class="mav-blog-sticky-post-ctn mav-blog__sticky_posts--ctn">' );
                    $mav_args = array(
                        'query_args'    => $mav_sticky_args,
                        'display'       => 3,
                        'auto_slide'    => false,
                        'template'      => '/template-parts/mav-card'
                    );
                    mavf_carousel( $mav_args );
                echo '</div>';
            echo '</div>';
        }

    endif;

    /**
     * Main Post Loop
     * ==============
     */
    // Get display style option for blog page
    $mav_card_style = ( get_option( 'mav_setting_blog_page_display_style' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_display_style' ) ) : 'card';

    // Get user setting to show sidebar in blog page
    $mav_not_show_sidebar = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );

    $mav_section_class = !$mav_not_show_sidebar ? 'mav-has-sidebar' : 'mav-site--width';

    printf( '<div class="%1$s">', $mav_section_class );

        $mav_args = array (
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'post_parent'           => 0,
            'ignore_sticky_posts'   => 1,
            'post_not__in'          => get_option( 'sticky_posts' ),
            'paged'                 => get_query_var( 'paged' ),
            'orderby'               => 'date'
        );

        $mav_query = new WP_Query( $mav_args );

        // Get total posts in the query
        $mav_posts_count = $mav_query->post_count;

        // Get default posts per page option
        $mav_posts_per_page = get_option( 'posts_per_page' );

        if ( $mav_query->have_posts() ) {
            printf('<section id="mavid-post-index" class="mav-post-index-wrapper mav-post__index--wrp">');

                // View settings section
                if ( !empty( get_option( 'mav_setting_blog_page_card_style_change' ) ) ) :
                    printf( '<div class="mav-blog_page__setting--wrp">' );
                        printf( '<div class="mavjs-setting-ctn mav-blog_page__setting--ctn">' );
                            printf('<span>%1$s</span>', __( 'Kiểu hiển thị:', 'mavericktheme' ));
                            printf( '<li class="mavjs-display-list mav-style__list" data-style="list" title="%1$s"><i class="fas fa-th-list"></i></li>', __( 'Hiển thị dạng danh sách', 'mavericktheme' ) );
                            printf( '<li class="mavjs-display-card mav-style__card" data-style="card" title="%1$s"><i class="fas fa-th-large"></i></li>', __( 'Hiển thị dạng thẻ', 'mavericktheme' ) );
                        echo '</div>';
                    echo '</div>';
                endif;

                $mav_columns = ( get_option( 'mav_setting_blog_page_columns' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_columns' ) ) : '3';

                // Get number of columns display
                $mav_display_classes = sprintf( 'mav-post-index-ctn' );
                /**
                 * Note: "mavjs-posts-container" class is for ajax function, do not remove
                 */
                printf(
                    '<div id="mavid-posts-container" class="mavjs-posts-container %1$s" data-display-style="%2$s" data-columns="%3$s">',
                    $mav_display_classes, $mav_card_style, $mav_columns
                );
                    while ( $mav_query->have_posts() )
                    {
                        $mav_query->the_post();
                        get_template_part( "template-parts/mav-card-index", get_post_format() );
                    }
                    // Reset post data
                    wp_reset_postdata();
                echo '</div>';

                /**
                 * Post Navigation Section
                 * =======================
                 */
                if ( esc_attr( get_option( 'mav_setting_ajax_load_posts' ) ) ) {
                    /**
                     * Ajax Load Posts
                     */
                    printf('<div class="mav-padding__top--lg">');
                        printf(
                            '<button class="mavjs-ajax-load-posts mav-btn__primary--lg mav-padding" data-full-width data-ajax-url="%1$s" data-current-page="1" data-action="mavf_ajax_load_posts">%2$s</button>',
                            admin_url( 'admin-ajax.php' ), __( 'Xem thêm', 'mavericktheme' )
                        );
                    echo '</div>';
                } else {
                    /**
                     * Post paginate links
                     */
                    echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper mav-paginate__links--wrp">';
                        echo '<div class="mav-paginate-links-ctn mav-paginate__links--ctn">';
                                $mav_args = array(
                                    'prev_text'          => __( 'TRANG TRƯỚC', 'mavericktheme' ),
                                    'next_text'          => __( 'TRANG SAU', 'mavericktheme' ),
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
        if ( !$mav_not_show_sidebar ) {
            get_sidebar();
        }

    echo '</div>';
?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>