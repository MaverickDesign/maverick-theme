<?php
/**
 * @package mavericktheme
 * Single Post Template
 */

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

    // Header
    printf('<header class="mav-post-header-wrapper mav-post__header--wrp">');
        printf('<div class="mav-post-header-ctn mav-post__header--ctn">');

            // Feature image
            if ( is_single() && ! is_attachment() ) {
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
                    printf(
                        '<div class="mav-post__excerpt--wrp">
                            <div class="mav-post__excerpt--ctn">
                                <p class="mav-post__excerpt">%1$s</p>
                            </div>
                        </div>',
                        get_the_excerpt()
                    );
                }
            }

            // Post info & social sharing
            printf('<div class="mav-post__header__utilities--wrp">');
                printf('<div class="mav-post__header__utilities--ctn">');
                    // Post info
                    if ( ! is_attachment() ) :
                        printf('<div id="mavid-post-info" class="mav-post__info--wrp">');
                            printf('<div class="mav-post__info--ctn">');

                                // Author
                                printf(
                                    '<div class="mav-post-info mav-post__info" data-type="author" title="%2$s %1$s">%3$s%1$s</div>',
                                    get_the_author(), __( 'Tác giả', 'mavericktheme' ), get_avatar( get_the_author_meta( 'ID' ), 32, '', __( 'Tác giả ', 'mavericktheme' ).get_the_author() )
                                );

                                // Date
                                printf( '<div class="mav-post-info mav-post__info" data-type="date">' );
                                    if ( function_exists( 'mavf_post_date' ) ) {
                                        mavf_post_date();
                                    }
                                echo '</div>';

                                // Category
                                printf( '<div class="mav-post-info mav-post__info" data-type="category">' );
                                    if ( function_exists('mavf_post_categories') ) {
                                        mavf_post_categories( $mav_id );
                                    }
                                echo '</div>';

                            echo '</div>';
                        echo '</div>';
                    endif;

                    // Social Sharing
                    printf('<div class="mav-post__socials--wrp">');
                        printf('<div class="mav-post__socials--ctn">');
                            // Facebook share button
                            get_template_part( 'template-parts/social-buttons/mav-btn__social--facebook' );
                            // Twitter share button
                            get_template_part( 'template-parts/social-buttons/mav-btn__social--twitter' );
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

        echo '</div>';
    echo '</header>';

    // Body
    printf('<section class="mav-post-content-wrapper mav-post__content--wrp">');
        echo '<div class="mav-post-content-ctn mav-post__content--ctn">';

            if ( function_exists( 'mavf_post_content_modifier' ) ) {
                $mav_json_file = TEMPLATE_DIR . '/template-parts/mav-patterns.json';
                if ( file_exists( $mav_json_file ) ) {
                    mavf_post_content_modifier($mav_json_file);
                }
            }
            printf('<div class="mav-post-content">');
                the_content();
            echo '</div>';

        echo '</div>';
    echo '</section>';

    // Footer
    if ( ( has_tag() ) || ( wp_count_posts()->publish > 1) ) :
        printf('<footer class="mav-post-footer mav-post-footer-wrapper">');
            printf('<div class="mav-post-footer-ctn">');

                if ( has_tag() ) :
                    // Post Tags
                    printf('<div class="mav-post-tags-wrapper">');
                        printf('<div class="mav-post-tags-ctn">');
                            printf('<h4 class="mav-margin-bottom-sm">%1$s</h4>', __( 'Thẻ liên kết', 'mavericktheme' ) );
                            the_tags('<ul id="mavid-tag-list" class="mav-tag-list"><li>', '</li><li>', '</li></ul>');
                        echo '</div>';
                    echo '</div>';
                endif;

                $mavCountPost = wp_count_posts();
                if ( $mavCountPost->publish > 1 ) :
                    // Post Navigation
                    printf('<div class="mav-post-navigation-wrapper">');
                        printf('<div class="mav-post-navigation-ctn">');
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
                        echo '</div>';
                    echo '</div>';
                endif;

            echo '</div>';
        echo '</footer>';
    endif;

echo '</article>';
?>

<?php
    /* Comment section */
    printf('<section id="mavid-sec-post-comment" class="mav-post__comment--wrp">');
        printf('<div class="mav-post__comment--ctn">');
            // Facebook comment plugin
            $mav_facebook_comment = esc_attr( get_option( 'mav_setting_facebook_comment' ) );
            if ( ! empty( $mav_facebook_comment ) ) {
                printf('<div class="mav-post__comment__facebook--wrp">');
                    printf('<div class="mav-post__comment__facebook--ctn">');
                        printf('<div class="fb-comments" data-href="%1$s" data-numposts="5" data-width="100%%"></div>', get_the_permalink() );
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
    echo '</section>';
?>

<div class="mav-divider"></div>
