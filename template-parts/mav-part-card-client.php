<?php
/**
 * @package mavericktheme
 * Template part: Card - Client
 */

if (has_post_thumbnail()) {
    printf('<div class="mav-card-client-wrapper">');
        printf('<div class="mav-card-client-ctn">');
            printf(
                '<a href="%1$s" title="%2$s">',
                esc_url(get_the_permalink()),
                __('Tìm hiều thêm về '.get_the_title(), 'mavericktheme')
            );
                printf(
                    '<header><figure><img src="%1$s"></figure></header>',
                    get_the_post_thumbnail_url(get_the_ID(), 'medium')
                );
            echo '</a>';
        echo '</div>';
    echo '</div>';
}