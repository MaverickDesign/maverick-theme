<?php
/**
 * @package mavericktheme
 */

printf('<header id="mavid-page-header" class="mav-page__header--wrp">');
    printf('<div class="mav-page__header--ctn">');

        // Featured Image
        if ( has_post_thumbnail() ) {
            echo '<div class="mav-page__feature__image" ';
                mavf_post_thumbnail_url('thumbnail');
            echo '></div>';
        }

        // Page Title
        printf('<div class="mav-page__title--wrp">');
            printf('<div class="mav-page__title--ctn">');
                the_title( '<h1 class="mav-page__title">', '</h1>' );
                // Page Intro
                if ( get_field('mav_page_intro') ) {
                    printf('<div class="mav-page__intro--wrp">');
                        printf('<div class="mav-page__intro--ctn">');
                            printf('<p class="mav-page__intro">%1$s</p>', get_field('mav_page_intro'));
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';

    echo '</div>';
echo '</header>';