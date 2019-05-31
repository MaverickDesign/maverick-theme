<?php
/**
 * @package mavericktheme
 */

if ( function_exists('mavf_button') ) {
    printf('<div class="mav-btn__ctn mav-padding" data-columns="2">');
        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);

        if ( !empty($url) ) {
            // Back button
            mavf_button(
                __( 'Quay lại trang trước', 'mavericktheme' ),
                $url,
                'mav-btn__secondary--lg'
            );
        }
        // mavf_button(
        //     __( 'Quay lại trang trước', 'mavericktheme' ),
        //     'javascript:history.go(-1)',
        //     'mav-btn-secondary-lg'
        // );

        // Home button
        mavf_button(
            __( 'Quay lại trang chủ', 'mavericktheme' ),
            get_bloginfo( 'url' ),
            'mav-btn__primary--lg'
        );
    echo '</div>';
}