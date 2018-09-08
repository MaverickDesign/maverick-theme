<?php
/**
 * @package mavericktheme
 * Single Post Template
 */
?>

<?php
    $mav_post_type = get_post_type();
?>

<article id="mavid-post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>" data-post-format="<?php echo get_post_format(); ?>" data-post-type="<?php echo get_post_type(); ?>" class="mav-post">
    <!-- Header -->
    <header class="mav-post-header-wrapper mav-post-header">
        <div class="mav-post-header-ctn">
            <!-- Feature image -->
            <?php if ( has_post_thumbnail() && ( $mav_post_type == 'post' ) ) : ?>
                    <div id="mavid-post-feature-image" class="mav-post-feature-image mav-hide-on-phone" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>)">
                    </div>
            <?php endif; ?>
            <!-- Post title -->
            <?php
                if ( is_single() && ! is_attachment() ) {
                    printf( '<div class="mav-pg-ctn"><h1 id="mavid-post-title" class="mav-post-title">%1$s</h1></div>', get_the_title() );
                }
            ?>
            <!-- Post info -->
            <?php if ( ! is_attachment() ) : ?>
                <div id="mavid-post-info" class="mav-post-info-wrapper">
                    <div class="mav-post-info-ctn">
                    <?php
                        $mav_single_cat = function_exists( 'mavf_get_single_category' ) ? mavf_get_single_category() : '';
                        if ( ! empty( $mav_single_cat ) ) {
                            printf(
                                '<span class="mav-post-info" title="%2$s %1$s" data-type="category">%3$s</span>',
                                $mav_single_cat, __( 'Xem các bài chuyên mục', 'mavericktheme' ), mavf_single_category()
                            );
                        }
                        printf('
                            <span class="mav-post-info" title="%2$s" data-type="date">%1$s</span>',
                            get_the_date(), __( 'Ngày đăng', 'mavericktheme' )
                        );
                        printf('
                            <span class="mav-post-info" title="%2$s" data-type="author">%1$s</span>',
                            get_the_author(), __( 'Tác giả', 'mavericktheme' )
                        );
                    ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </header>
    <!-- Post Content -->
    <?php
        $mav_center_style = '';
        $mav_post_format = get_post_format();
        if ( $mav_post_format == 'video' ) {
            $mav_center_style = 'style="text-align: center;"';
        }
    ?>
    <section class="mav-post-content-wrapper">
        <div class="mav-post-content mav-post-content-ctn" <?php echo $mav_center_style; ?>>
            <?php
                if ( function_exists( 'mavf_post_content_modifier' ) ) {
                    $mav_json_file = TEMPLATE_DIR . '/template-parts/mav-patterns.json';
                    if ( file_exists( $mav_json_file ) ) {
                        mavf_post_content_modifier($mav_json_file);
                    }
                }
                the_content();
            ?>
        </div>
    </section>
    <!-- Post Footer -->
    <?php
    if ( ( has_tag() ) || ( wp_count_posts()->publish > 1) ) : ?>
        <footer class="mav-post-footer mav-post-footer-wrapper">
            <div class="mav-post-footer-ctn">
                <?php if ( has_tag() ) : ?>
                    <!-- Post Tags -->
                    <div class="mav-post-tags-wrapper">
                        <div class="mav-post-tags-ctn">
                            <?php
                                printf('<h4 class="mav-margin-bottom-sm">%1$s</h4>', __( 'Thẻ liên kết', 'mavericktheme' ) );
                                the_tags('<ul id="mavid-tag-list" class="mav-tag-list"><li>', '</li><li>', '</li></ul>');
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                    $mavCountPost = wp_count_posts();
                    if ( $mavCountPost->publish > 1 ) : ?>
                        <!-- Post Navigation -->
                        <div class="mav-post-navigation-wrapper">
                            <div class="mav-post-navigation-ctn">
                            <?php
                                $mavTitle = __( 'Các bài viết khác', 'mavericktheme' );
                                // Attachment Page
                                if ( is_attachment() ) {
                                    $mavTitle = __( 'Trở lại bài viết', 'mavericktheme' );
                                }
                                printf( '<h4 class="mav-margin-bottom-sm">%1$s</h4>', $mavTitle );
                                echo '<nav class="mav-post-navigation">';
                                    previous_post_link('%link', '%title');
                                    next_post_link('%link', '%title');
                                echo '</nav>';
                            ?>
                            </div>
                        </div> <?php
                    endif;
                ?>
            </div>
        </footer> <?php
    endif;
    ?>
</article>

<?php
    /**
     * Related posts
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
                            $mav_number_of_posts_display = $categories[0]->count > 4 ? 4 : $categories[0]->count;
                            $mav_args = array(
                                'query_args'    => array(
                                    'post_type' => $mav_post_type,
                                    'cat'   => $categories[0]->term_id
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