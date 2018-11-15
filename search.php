<?php
/**
 * @package mavericktheme
 * Search result page
 */

get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php
/**
 * Main Post Loop
 */

// Get user setting to show sidebar in blog page
$mavSidebar = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );

$mavSectionClass = $mavSidebar ? 'mav-has-sidebar' : 'mav-site-width';

printf('<div class="%1$s">', $mavSectionClass);
    printf('<section id="mavid-post-index" class="mav-post-index-wrapper">');
        if ( have_posts() ) {
            $mavColumns = ( get_option( 'mav_setting_blog_page_columns' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_columns' ) ) : '4';
            /**
             * Note: "mavjs-posts-container" class is for ajax function, do not remove
             */
            printf(
                '<div id="mavid-posts-container" class="mavjs-posts-container mav-post-index-ctn mav-grid-col-%1$s">',
                $mavColumns
            );
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/mav-card' );
                }
            echo '</div>';

            // Post Navigation
            if ( esc_attr(get_option( 'mav_setting_ajax_load_posts' ) ) ) {
                /**
                 * Ajax load more posts
                 */
                echo '<div class="mav-padding-top-lg">';
                    printf(
                        '<button class="mav-btn-primary-lg mavjs-ajax-load-posts" data-full-width data-ajax-url="%1$s" data-current-page="1" data-action="mavf_ajax_load_posts">%2$s</button>',
                        admin_url( 'admin-ajax.php' ), __('Xem thêm', 'mavericktheme')
                    );
                echo '</div>';
            } else {
                /**
                 * Post paginate links
                 */
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
            }
        } else {
            printf('<div class="mav-grid mav-text--center">');
                printf(
                    '<h1 class="mav-margin-bottom-xl">%1$s</h1>',
                    __( 'Không tìm thấy nội dung', 'mavericktheme' )
                );
                printf(
                    '<p class="mav-text--lg">%1$s</p>',
                    __( 'Không tìm thấy nội dung bạn cần tìm trên website này. Vui lòng kiểm tra lại từ khóa cần tìm hoặc tìm bằng từ khóa khác.', 'mavericktheme' )
                );
                echo '<div class="mav-margin-top-xl">';
                    /* Back and Home Buttons */
                    include TEMPLATE_DIR.'/template-parts/mav-button__back-and-home.php';
                echo '</div>';
            echo '</div>';
        }
    echo '</section>';

    /**
     * Sidebar widgets
     */
    if ( $mavSidebar ) {
        get_sidebar();
    }
echo '</div>';
?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>