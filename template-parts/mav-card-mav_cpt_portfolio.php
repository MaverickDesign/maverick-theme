<?php
/**
 * @package mavericktheme
 */

// Get the Post or Page ID
$mav_id = get_the_ID();

printf( '<div class="mav-card-wrapper" data-post-id="%1$s">', $mav_id );
    printf( '<div class="mav-card-ctn" data-post-id="%1$s">', $mav_id );
        printf( '<article class="mav-card mav-card-cpt-portfolio" data-postid="%1$s">', $mav_id );
            /**
             * Card Header
             */
            printf( '<header class="mav-card-header">');
                if ( has_post_thumbnail() && function_exists( 'mavf_get_post_thumbnail_url' ) ) :
                    printf( '<a href="%1$s" class="mav-card-thumbnail-wrapper">', get_the_permalink() );
                        printf(
                            '<div class="mav-card-thumbnail" %1$s></div>',
                            mavf_get_post_thumbnail_url( 'large' )
                        );
                    echo '</a>';
                endif;
            echo '</header>';

            /**
             * Card Body
             */
            printf('<section class="mav-card-content">');
                // Post Info
                printf('<div class="mav-card-info-wrapper">');
                    printf('<div class="mav-card-info-ctn">');
                        the_category( '' );
                    echo '</div>';
                echo '</div>';

                // Post Title
                printf('<div class="mav-card-title-wrapper">');
                    printf(
                        '<h3 class="mav-card-title" title="%3$s%1$s"><a href="%2$s">%1$s</a></h3>',
                        get_the_title(), get_the_permalink(), __( 'Xem sản phẩm ', 'mavericktheme' )
                    );
                echo '</div>';
            echo '</section>';

            /**
             * Card Footer
             */
            // printf('<footer class="mav-card-footer">');
            //     the_tags('<ul class="mav-tag-list"><li>', '</li><li>', '</li></ul>');
            // echo '</footer>';
        echo '</article>';
    echo '</div>';
echo '</div>';
