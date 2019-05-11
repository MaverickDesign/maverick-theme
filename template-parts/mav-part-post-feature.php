<?php
/**
 * @package mavericktheme
 */

$mav_post_type    = get_post_type();
$mav_post_id      = get_the_ID();
$mav_name_space   = 'mav-post-feature';

if ( ! empty( $mav_title_side ) ) {
    $mav_title_side = 'style=" grid-area: '.$mav_title_side.'!important"';
}

printf(
    '<div id="mavid-featured-post-%2$d" data-post-type="%1$s" class="%3$s">',
    $mav_post_type, $mav_post_id , $mav_class_wrapper_item
    );
    printf( '<div class="%1$s">', $mav_class_container_item );

        // Figure - Post featured image
        printf( '<div class="mav-post__feature__figure--wrp">' );
            printf( '<div class="mav-post__feature__figure--ctn">' );
                printf( '<figure style="background: url(%1$s);">', get_the_post_thumbnail_url() );
                echo '</figure>';
            echo '</div>';
        echo '</div>';

        // Info
        printf( '<div class="%1$s-info-wrapper" %2$s>', $mav_name_space, $mav_title_side );
            printf('<div class="%1$s-info-ctn">', $mav_name_space);
                // Title
                printf( '<header class="mav-post__feature__title--wrp">' );
                    printf( '<div class="mav-post__feature__title--ctn">' );
                        printf(
                            '<h3 class="mav-post__feature__title"><a href="%3$s" title="%4$s %1$s">%1$s</a></h3>',
                            get_the_title(), $mav_name_space, get_the_permalink(), __( 'Đến trang' , 'mavericktheme' )
                        );
                    echo '</div>';
                echo '</header>';

                // Intro
                $mav_intro_content = ( $mav_post_type == 'page' ) ?  get_post_meta( get_the_ID(), 'mav_page_intro', true ) : get_the_excerpt();

                printf( '<div class="mav-post__feature__intro--wrp">' );
                    printf( '<div class="mav-post__feature__intro--ctn">' );
                        printf( '<p>%1$s</p>', $mav_intro_content );
                    echo '</div>';
                echo '</div>';

                // CTA Button
                printf( '<footer class="mav-cta__wrp">' );
                    printf( '<div class="mav-cta__ctn">' );
                        printf(
                            '<button class="mav-btn-cta mav-btn__cta"><a href="%2$s" title="%3$s">%1$s</a></button>',
                            $mav_button_text, get_the_permalink(), __( 'Đến trang '.get_the_title(), 'mavericktheme' )
                        );
                    echo '</div>';
                echo '</footer>';
            echo '</div>';
        echo '</div>';

    echo '</div>';
echo '</div>';