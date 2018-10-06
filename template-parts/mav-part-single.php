<?php
/**
 * @package mavericktheme
 * Single Post Template
 */
?>

<?php
    // Get post ID
    $mav_id = get_the_ID();
    // Get post type
    $mav_post_type = get_post_type();
    // Get post format
    $mav_post_format = get_post_format();

    printf(
        '<article id="mavid-post-%1$s" data-post-id="%1$s" data-post-type="%2$s" data-post-format="%3$s" class="mav-post">',
        $mav_id, $mav_post_type, $mav_post_format
        );
?>

    <!-- Header -->
    <header class="mav-post-header-wrapper mav-post-header">
        <div class="mav-post-header-ctn">
            <?php
                if ( is_single() && ! is_attachment() ) {
                    // Feature image
                    if ( has_post_thumbnail() && ( $mav_post_type == 'post' ) ) :
                        $mav_breadcrumbs = get_option( 'mav_setting_breadcrumbs' );
                        $mav_breadcrumbs_height = isset( $mav_breadcrumbs['header'] ) ? '67px' : '0px';
                        // $mav_height = 'height: calc( 100vh - ( (80px) + (67px) + ('.$mav_breadcrumbs_height.') ) );';
                        $mav_height = 'height: 55vh;';
                        $mav_image_url = get_the_post_thumbnail_url( $mav_id, 'full' );
                        printf('<div class="mav-post__feature_image--wrp">');
                            printf('<div class="mav-post__feature_image--ctn">');
                                printf(
                                    '<div id="mavid-post-feature-image" class="mav-post__feature_image" style="background-image: url(%1$s); %2$s" data-message="%3$s"></div>',
                                    $mav_image_url, $mav_height, __( 'Xem nội dung bên dưới', 'mavericktheme' )
                                );
                            echo '</div>';
                        echo '</div>';
                    endif;

                    // Post title
                    printf(
                        '<div class="mav-post__title--wrp">
                            <div class="mav-post__title--ctn">
                                <h1 id="mavid-post-title" class="mav-post__title">%1$s</h1>
                            </div>
                        </div>',
                        get_the_title()
                    );

                    // Post excerpt
                    if ( has_excerpt() ) {
                        printf('<div class="mav-post__excerpt--wrp">');
                            printf('<div class="mav-post__excerpt--ctn">');
                                printf ('<p class="mav-post__excerpt">%1$s</p>', get_the_excerpt() );
                            echo '</div>';
                        echo '</div>';
                    }
                }
            ?>

            <!-- Post info -->
            <?php if ( ! is_attachment() ) : ?>
                <div id="mavid-post-info" class="mav-post-info-wrapper">
                    <div class="mav-post-info-ctn">
                        <?php
                            // Category
                            printf( '<div class="mav-post-info" data-type="category">' );
                                if ( function_exists('mavf_post_categories') ) {
                                    mavf_post_categories( $mav_id );
                                }
                            echo '</div>';

                            // Author
                            printf(
                                '<div class="mav-post-info" title="%2$s %1$s" data-type="author">%3$s%1$s</div>',
                                get_the_author(), __( 'Tác giả', 'mavericktheme' ), get_avatar( get_the_author_meta( 'ID' ), 32, '', __( 'Tác giả ', 'mavericktheme' ).get_the_author() )
                            );

                            // Date
                            printf( '<div class="mav-post-info" data-type="date">' );
                                if ( function_exists( 'mavf_post_date' ) ) {
                                    mavf_post_date();
                                }
                            echo '</div>';
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
                printf('<div class="mav-post__socials--wrp">');
                    printf('<div class="mav-post__socials--ctn">');
                        // Facebook Share Button
                        $mav_efa  = esc_attr( get_option( 'mav_setting_enable_facebook_app' ) );
                        $mav_faid = esc_attr( get_option( 'mav_setting_facebook_app_id' ) );
                        if ( ! empty( $mav_efa ) && ! empty( $mav_faid ) ) :
                            echo '<li class="mav-social__btn" title="'.__( 'Chia sẻ Facebook', 'mavericktheme' ).'" data-facebook><a target="_blank" href="https://www.facebook.com/dialog/share?app_id='.$mav_faid.'&amp;display=popup&amp;href='.get_post_permalink().'"><i class="fab fa-facebook-f"></i></a></li>';
                        endif;

                    echo '</div>';
                echo '</div>';
            ?>

        </div>
    </header>

    <!-- Post Content -->
    <section class="mav-post-content-wrapper">
        <div <?php post_class('mav-post-content mav-post-content-ctn') ?>>
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
                                    'post_type' => $mav_post_type,
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