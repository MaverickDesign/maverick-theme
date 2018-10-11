<?php
/**
 * @package mavericktheme
 */
?>

<?php
    get_header();
?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
    <section class="mav-page-wrapper">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/mav-part-single', get_post_format() );
            }
        }
        ?>
    </section>

<?php
/* Comment section */
printf('<section id="mavid-sec-post-comment" class="mav-post__comment--wrp">');
    printf('<div class="mav-post__comment--ctn">');
        // Facebook comment plugin
        $mav_facebook_comment = esc_attr( get_option( 'mav_setting_facebook_comment' ) );
        if ( ! empty( $mav_facebook_comment ) ) {
            printf('<div class="mav-post__comment__facebook--wrp">');
                printf('<div class="mav-post__comment__facebook--ctn">');
                    echo '<div class="fb-comments" data-href="'.get_the_permalink().'" data-numposts="5" data-width="100%"></div>';
                echo '</div>';
            echo '</div>';
        }
    echo '</div>';
echo '</section>';
?>

<?php
    /**
     * Related posts section
     * =====================
     */

    $categories = get_the_category();

    if ( function_exists( 'mavf_carousel' ) && ! empty( $categories ) && $categories[0]->count > 2 ) : ?>
        <section id="mavid-sec-related-posts" class="mav-sec-wrapper">
            <div class="mav-sec-ctn">

                <!-- Header -->
                <header class="mav-sec-header-wrapper">
                    <div class="mav-sec-header-ctn">
                        <!-- Title wrapper -->
                        <div class="mav-sec-title-wrapper">
                            <div class="mav-sec-title-ctn">
                                <h3 class="mav-sec-title">
                                    <?php
                                        if ( ! empty( $categories ) ) {
                                            printf(
                                                '%4$s <a href="%1$s" title="%3$s %2$s" style="text-decoration: none;"><strong class="mav-no-break">%2$s</strong></a>',
                                                esc_url( get_category_link( $categories[0]->term_id ) ),
                                                esc_html( $categories[0]->name ),
                                                __( 'Xem tất cả bài trong chuyên mục', 'mavericktheme' ),
                                                __( 'Cùng chuyên mục', 'mavericktheme' )
                                            );
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Body -->
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn">
                        <?php
                            // Check if total post is greater than number of post to display
                            $mav_number_of_posts_display = ($categories[0]->count > 4) ? 4 : $categories[0]->count - 1;
                            $mav_args = array(
                                'query_args'    => array(
                                    'post_type' => get_post_type(),
                                    'cat'       => $categories[0]->term_id
                                ),
                                'display'   => $mav_number_of_posts_display
                            );
                            mavf_carousel( $mav_args );
                        ?>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="mav-sec-footer-wrapper">
                    <div class="mav-sec-footer-ctn">
                        <?php
                            printf(
                                '<button class="mav-btn-primary-lg"><a href="%1$s" title="%3$s %2$s">%4$s</a></button>',
                                esc_url( get_category_link( $categories[0]->term_id ) ),
                                esc_html( $categories[0]->name ),
                                __( 'Xem tất cả bài trong chuyên mục', 'mavericktheme' ),
                                __( 'Xem đầy đủ', 'mavericktheme' )
                            );
                        ?>
                    </div>
                </footer>

            </div>
        </section>
    <?php endif;
?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>