<?php
/**
 * @package mavericktheme
 */

printf('<header id="mavid-page-header" class="mav-page__header--wrp">');
    if (has_post_thumbnail()) {
        // Featured Image
        echo '<div class="mav-page__feature__image" ';
        mavf_post_thumbnail_url();
        echo '></div>';
    }
    // Page Title
    printf('<div class="mav-page-title-wrapper mav-page__title--wrp">');
        printf('<div class="mav-page-title-ctn mav-page__title--ctn">');
            the_title('<h1 class="mav-page-title mav-page__title">', '</h1>');
        echo '</div>';
    echo '</div>';
echo '</header>';