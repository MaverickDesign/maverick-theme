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
    $mavStickyPosts = get_option( 'sticky_posts' );
    if (is_home() && count($mavStickyPosts) > 0) {
        $mavStickyArgs = array(
            'post_type' => 'post',
            'post__in' => $mavStickyPosts,
            'ignore_sticky_posts' => 1
        );

        $mavStickyQuery = new WP_Query( $mavStickyArgs );

        if ($mavStickyQuery->have_posts()) {
            echo '<section class="mav-blog-sticky-post-wrapper">';
                echo '<div class="mav-blog-sticky-post-ctn">';
                    while ($mavStickyQuery->have_posts()) {
                        $mavStickyQuery->the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    }
                    wp_reset_postdata();
                echo '</div>';
            echo '</section>';
        }
    }

    /**
     * Main Post Loop
     */

    // Get user setting to show sidebar in blog page
    $mavSidebar = esc_attr(get_option('mav_setting_blog_page_sidebar'));

    $mavSectionClass = $mavSidebar ? 'mav-has-sidebar' : 'mav-site-width';

    printf('<section class="%1$s">', $mavSectionClass);
        $mavArgs = array (
            'post_type' => 'post',
            'post_status'   => 'publish',
            'post__not_in' => $mavStickyPosts,
            'ignore_sticky_posts' => 1
        );

        $mavQuery = new WP_Query( $mavArgs );

        if ($mavQuery->have_posts()) {
            printf('<section id="mavid-post-index" class="mav-post-index-wrapper">');
                /**
                 * Note: "mavjs-posts-container" class is for ajax function, do not remove
                 */
                printf('<div class="mavjs-posts-container mav-post-index-ctn mav-grid-col-%1$s">', esc_attr(get_option('mav_setting_blog_page_columns')));
                    while ($mavQuery->have_posts()) {
                        $mavQuery->the_post();
                        // Get post template
                        get_template_part( 'template-parts/content', get_post_format() );
                    }
                        wp_reset_query();
                echo '</div>';

                // Post Navigation
                if (esc_attr(get_option('mav_setting_ajax_load_posts'))) {
                    /**
                     * Ajax load more posts
                     */
                    echo '<div class="mav-margin-top">';
                    printf('<a class="mav-btn-primary mavjs-ajax-load-posts" data-ajax-url="%1$s" data-current-page="1" data-action="mavf_ajax_load_posts">%2$s</a>',admin_url('admin-ajax.php'),__('Xem thêm','mavericktheme'));
                    echo '</div>';
                } else {
                    /**
                     * Post paginate links
                     */
                    echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper">';
                        echo '<div class="mav-paginate-links-ctn">';
                                $mavArgs = array(
                                    // 'prev_next'          => false,
                                    'prev_text'          => __('Trang trước','mavericktheme'),
                                    'next_text'          => __('Trang sau','mavericktheme'),
                                    'before_page_number' => '',
                                    'after_page_number'  => ''
                                );
                                echo paginate_links($mavArgs);
                        echo '</div>';
                    echo '</div>';
                }
            echo '</section>';
        }

    /*
     * Sidebar widgets
     */
    if ($mavSidebar) {
        get_sidebar();
    }
    echo '</section>';
    ?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>