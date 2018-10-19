<?php
/**
 * @package mavericktheme
 */

// $mav_background_style = has_post_thumbnail() ? '' : 'background: var(--mav-color--accent);';

printf('<header id="mavid-page-header" class="mav-page__header--wrp">');
    printf('<div class="mav-page__header--ctn">');
        // Featured Image
        if ( has_post_thumbnail() ) {
            echo '<div class="mav-page__feature__image" ';
            mavf_post_thumbnail_url();
            echo '></div>';
        }
        // Page Title
        printf('<div class="mav-page-title-wrapper mav-page__title--wrp">');
            printf('<div class="mav-page-title-ctn mav-page__title--ctn">');
                the_title('<h1 class="mav-page__title">', '</h1>');
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</header>';