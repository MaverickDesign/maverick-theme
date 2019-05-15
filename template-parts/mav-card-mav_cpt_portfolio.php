<?php
/**
 * @package mavericktheme
 */

// Get the Post or Page ID
$mav_id = get_the_ID();
$mav_post_type = get_post_type( $mav_id );
$mav_permalink = get_the_permalink( $mav_id );
$mav_title = get_the_title( $mav_id );
$mav_background_logo = function_exists( 'mavf_brand_logo_background' ) ? mavf_brand_logo_background( true, '240,240,240,1', '0,0,0,0.05', '0,0,0,0' ) : '';

printf( '<div class="mav-card__wrp">' );
    printf( '<div class="mav-card__ctn">' );

        printf( '<article class="mav-card__content--wrp" data-post-id="%1$s" data-cpt="%2$s">', $mav_id, $mav_post_type );

            // Card header wrapper
            printf( '<header class="mav-card__header--wrp">' );
                // Card header container
                printf( '<div class="mav-card__header--ctn">');

                    // Featured image wrapper
                    printf('<div class="mav-card__post__thumbnail--wrp">');
                        // Featured image container
                        printf( '<figure class="mav-card__post__thumbnail--ctn" data-cpt="%1$s" data-message="%2$s">', $mav_post_type, __( 'Nhấn để xem', 'mavericktheme' ) );
                            // Featured image
                            if ( has_post_thumbnail() ) {
                                // printf(
                                //     '<a href="%2$s" title="%3$s"><div class="mav-card__post__thumbnail"  %1$s></div></a>',
                                //     mavf_get_post_thumbnail_url( 'large' ), $mav_permalink, __('Xem nội dung '.$mav_title, 'mavericktheme')
                                // );
                                printf(
                                    '<div class="mav-card__post__thumbnail"  %1$s></div>',
                                    mavf_get_post_thumbnail_url( 'large' ), $mav_permalink, __('Xem nội dung '.$mav_title, 'mavericktheme')
                                );
                            }
                        echo '</figure>';
                    echo '</div>';

                echo '</div>';
            echo '</header>';

            /**
             * Card Body
             */
            printf('<section class="mav-card-content">');
            echo '</section>';

            /**
             * Card Footer
             */
            printf('<footer class="mav-card__footer--wrp">');
                printf('<div class="mav-card__footer--ctn">');
                echo '</div>';
            echo '</footer>';

        echo '</article>';
    echo '</div>';
echo '</div>';
