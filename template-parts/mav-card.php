<?php
/**
 * @package mavericktheme
 * Default Post Card Style
 */

// Get the Post or Page ID
$mav_id = get_the_ID();

$mav_sticky_post = is_sticky( $mav_id ) ? 'sticky' : '';

printf( '<div class="mav-card--wrapper" data-post-id="%1$s">', $mav_id );
    printf('<div class="mav-card--ctn">');
        printf( '<article class="mav-card--post %2$s" data-post-id="%1$s">', $mav_id, $mav_sticky_post );

            /**
             * Card Header
             */

            // Brand Logo Background
            $mav_background_logo = function_exists( 'mavf_brand_logo_background' ) ? mavf_brand_logo_background( true, '240,240,240,1', '0,0,0,0.05', '0,0,0,0' ) : '';

            printf( '<header class="mav-card-post-header" %1$s>', $mav_background_logo );
                if ( has_post_thumbnail() && function_exists( 'mavf_get_post_thumbnail_url' ) ) :
                    printf( '<a href="%1$s" class="mav-card-post-thumbnail-wrapper">', get_the_permalink() );
                        printf(
                            '<div class="mav-card-post-thumbnail" %1$s></div>',
                            mavf_get_post_thumbnail_url( 'large' )
                        );
                    echo '</a>';
                endif;
            echo '</header>';

            /**
             * Card Body
             */
            printf('<section class="mav-card-post-content">');
                printf('<div class="mav-card-post-info-wrapper">');
                    printf('<div class="mav-card-post-info-ctn mav-padding">');
                        if ( function_exists( 'mavf_get_single_category' ) && function_exists( 'mavf_single_category' ) && ! empty( mavf_get_single_category() ) ) :
                            printf(
                                '<span class="mav-post-info" data-type="category" title="%3$s%2$s">%1$s</span>',
                                mavf_single_category(), mavf_get_single_category(), __( 'Xem mục ', 'mavericktheme' )
                            );
                        endif;
                        printf( '<span class="mav-post-info" data-type="date">%1$s</span>', get_the_date() );
                    echo '</div>';
                echo '</div>';
                // Title
                printf('<div class="mav-card-title-wrapper">');
                    printf('<div class="mav-card__title--ctn">');
                        printf(
                            '<h3 class="mav-card-title" title="%3$s%1$s"><a href="%2$s">%1$s</a></h3>',
                            get_the_title(), get_the_permalink(), __( 'Xem nội dung ', 'mavericktheme' )
                        );
                    echo '</div>';
                echo '</div>';

                if (is_home()) {
                    printf('<div class="mav-card__excerpt--wrp">');
                        printf('<div class="mav-card__excerpt--ctn">');
                            printf( '<p class="mav-card__excerpt">%1$s</p>', get_the_excerpt() );
                        echo '</div>';
                    echo '</div>';
                }
            echo '</section>';

            /**
             * Card Footer
             */
            printf('<footer class="mav-card-post-footer">');
                printf(
                    '<button class="mav-btn-primary" data-full-width><a href="%1$s" title="%2$s">%2$s</a></button>',
                    get_the_permalink(), __( 'Xem chi tiết', 'mavericktheme' )
                );
            echo '</footer>';
        echo '</article>';
    echo '</div>';
echo '</div>';
