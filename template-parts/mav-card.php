<?php
/**
 * @package mavericktheme
 * Default Post Card Style
 */

$mav_id = get_the_ID();
$mav_sticky_post = is_sticky( $mav_id ) ? 'sticky' : '';
$mav_permalink = get_the_permalink($mav_id);
$mav_title = get_the_title($mav_id);

// Card wrapper
printf( '<div class="mav-card__wrp" data-post-id="%1$s">', $mav_id );
    // Card container
    printf('<div class="mav-card__ctn">');

        // Card content wrapper
        printf( '<article class="mav-card__content--wrp %2$s" data-post-id="%1$s">', $mav_id, $mav_sticky_post );
            // Card content container
            printf('<div class="mav-card__content--ctn">');

                // Brand Logo Background
                $mav_background_logo = function_exists( 'mavf_brand_logo_background' ) ? mavf_brand_logo_background( true, '240,240,240,1', '0,0,0,0.05', '0,0,0,0' ) : '';

                // Card header
                printf( '<header class="mav-card__header--wrp">');
                    printf( '<div class="mav-card__header--ctn" %1$s>', $mav_background_logo );

                        // Featured image wrapper
                        printf('<div class="mav-card__post__thumbnail--wrp" %1$s>', $mav_background_logo);
                            // Featured image container
                            printf('<figure class="mav-card__post__thumbnail--ctn">');
                                // Featured image
                                if ( has_post_thumbnail() ) {
                                    printf(
                                        '<a href="%2$s" title="%3$s"><div class="mav-card__post__thumbnail" %1$s></div></a>',
                                        mavf_get_post_thumbnail_url( 'large' ), $mav_permalink, __('Xem nội dung '.$mav_title, 'mavericktheme')
                                    );
                                }
                            echo '</figure>';
                        echo '</div>';

                    echo '</div>';
                echo '</header>';

                // Card body
                printf('<section class="mav-card__body--wrp">');
                    printf('<div class="mav-card__body--ctn">');

                        // Card body header
                        printf('<header class="mav-card__body__header--wrp">');
                            printf('<div class="mav-card__body__header--ctn">');

                                // Post Date
                                printf('<div class="mav-card__post__date--wrp">');
                                    printf('<div class="mav-card__post__date--ctn mav-post-info" data-type="date">');
                                        mavf_post_date();
                                    echo '</div>';
                                echo '</div>';

                                // Post Categories
                                printf('<div class="mav-card__post__categories--wrp">');
                                    printf('<div class="mav-card__post__categories--ctn mav-post-info" data-type="category">');
                                        if ( function_exists('mavf_post_categories') ) {
                                            mavf_post_categories( $mav_id );
                                        }
                                    echo '</div>';
                                echo '</div>';

                            echo '</div>';
                        echo '</header>';

                        // Card body body
                        printf('<div class="mav-card__body__body--wrp">');
                            printf('<div class="mav-card__body__body--ctn">');

                                // Card title wrapper
                                printf('<div class="mav-card__title--wrp">');
                                    // Card title container
                                    printf('<div class="mav-card__title--ctn">');
                                        printf(
                                            '<h3 class="mav-card__title" title="%3$s%1$s"><a href="%2$s">%1$s</a></h3>',
                                            get_the_title(), get_the_permalink(), __( 'Xem nội dung ', 'mavericktheme' )
                                        );
                                    echo '</div>';
                                echo '</div>';

                                // Card excerpt
                                if ( is_home() && has_excerpt() ) {
                                    // Card excerpt wrapper
                                    printf('<div class="mav-card__excerpt--wrp">');
                                        // Card excerpt container
                                        printf('<div class="mav-card__excerpt--ctn">');
                                            printf( '<p class="mav-card__excerpt">%1$s</p>', get_the_excerpt() );
                                        echo '</div>';
                                    echo '</div>';
                                }

                            echo '</div>';
                        echo '</div>';

                    echo '</div>';
                echo '</section>';

                // Card footer
                printf('<footer class="mav-card__footer--wrp">');
                    printf('<div class="mav-card__footer--ctn mav-padding">');
                        printf(
                            '<button class="mav-btn__primary" data-full-width><a href="%1$s" title="%2$s">%2$s</a></button>',
                            get_the_permalink(), __( 'Xem chi tiết', 'mavericktheme' )
                        );
                    echo '</div>';
                echo '</footer>';

            echo '</div>';
        echo '</article>';

    echo '</div>';
echo '</div>';
