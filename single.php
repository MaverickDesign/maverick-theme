<?php
/**
 * @package mavericktheme
 */

get_header();

/* Page content starts here */
printf('<main id="mavid-page-main-content">');
    printf('<section class="mav-page__wrp">');
        printf('<div class="mav-page__ctn">');
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/mav-part-single', get_post_format());
                }
            }        
        echo '</div>';
    echo '</section>';

    /* Comment section */
    printf('<section class="mav-post__comment--wrp">');
        printf('<div class="mav-post__comment--ctn">');
            // Facebook comment plugin
            $mav_facebook_comment = esc_attr( get_option( 'mav_setting_facebook_comment' ) );
            if ( !empty( $mav_facebook_comment ) ) {
                printf('<div class="mav-post__comment__facebook--wrp">');
                    printf('<div class="mav-post__comment__facebook--ctn">');
                        echo '<div class="fb-comments" data-href="'.get_the_permalink().'" data-numposts="5" data-width="100%"></div>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
    echo '</section>';

    /**
     * Related posts section
     * =====================
     */

    $categories = get_the_category();
    if ( function_exists( 'mavf_carousel' ) && ! empty( $categories ) && $categories[0]->count > 2 ) :
        printf('<section class="mav-sec--wrp">');
            printf('<div class="mav-sec--ctn">');

                /* Header */
                printf('<header class="mav-sec__header--wrp">');
                    printf('<div class="mav-sec__header--ctn">');
                        /* Title wrapper */
                        printf('<div class="mav-sec__title--wrp">');
                            printf('<div class="mav-sec__title--ctn">');
                                printf('<h3 class="mav-sec__title">');
                                if ( ! empty( $categories ) ) {
                                    printf(
                                        '%4$s <a href="%1$s" title="%3$s %2$s" style="text-decoration: none;"><strong class="mav-no-break">%2$s</strong></a>',
                                        esc_url( get_category_link( $categories[0]->term_id ) ),
                                        esc_html( $categories[0]->name ),
                                        __( 'Xem tất cả bài trong chuyên mục', 'mavericktheme' ),
                                        __( 'Cùng chuyên mục', 'mavericktheme' )
                                    );
                                }
                                echo '</h3>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</header>';

                /* Body */
                printf('<div class="mav-sec__body--wrp">');
                    printf('<div class="mav-sec__body--ctn">');
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
                    echo '</div>';
                echo '</div>';

                /* Footer */
                printf('<footer class="mav-sec__footer--wrp">');
                    printf('<div class="mav-sec__footer--ctn">');
                        printf(
                            '<button class="mav-btn__primary--lg"><a href="%1$s" title="%3$s %2$s">%4$s</a></button>',
                            esc_url( get_category_link( $categories[0]->term_id ) ),
                            esc_html( $categories[0]->name ),
                            __( 'Xem tất cả bài trong chuyên mục', 'mavericktheme' ),
                            __( 'Xem đầy đủ', 'mavericktheme' )
                        );
                    echo '</div>';
                echo '</footer>';

            echo '</div>';
        echo '</section>';
    endif;

echo '</main>';
/* Page content ends here */

get_footer();
