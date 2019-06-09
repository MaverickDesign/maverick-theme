<?php
/**
 * @package mavericktheme
 */

function mavf_enqueue_scripts()
{
    /**
     * jQuery
     */
    wp_deregister_script('jquery');
    wp_register_script(
        'jquery',
        TEMPLATE_URI . '/js/vendor/jquery-3.3.1.min.js',
        false,
        '3.3.1',
        true
    );
    wp_enqueue_script('jquery');

    /**
     * Enqueue Maverick Scripts
     */

    // Helper Scripts
    wp_enqueue_script(
        'mavericktheme-helpers',
        TEMPLATE_URI . '/js/mav-helpers.js',
        false,
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'mavericktheme-count-down',
        TEMPLATE_URI . '/js/mav-count-down.js',
        false,
        '1.0.0',
        true
    );

    $mav_maintenance = esc_attr( get_option( 'mav_setting_maintenance' ) );

    if ( empty( $mav_maintenance ) ) :

        // Type Writter
        wp_enqueue_script(
            'mavericktheme-type-writter',
            TEMPLATE_URI . '/js/mav-type-writter.js',
            false,
            '1.0.0',
            true
        );

        // Sliders
        wp_enqueue_script(
            'mavericktheme-slider',
            TEMPLATE_URI . '/js/mav-slider.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-uni-slider',
            TEMPLATE_URI . '/js/mav-uni-slider.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-carousel',
            TEMPLATE_URI . '/js/mav-carousel.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-lightbox',
            TEMPLATE_URI . '/js/mav-lightbox.js',
            false,
            '1.0.0',
            true
        );

        /* Header Menu */
        wp_enqueue_script(
            'mavericktheme-header-menu',
            TEMPLATE_URI . '/js/mav-header-menu.js',
            false,
            '1.0.0',
            true
        );

        /* Ajax load posts */
        wp_enqueue_script(
            'mavericktheme-ajax-load-posts',
            TEMPLATE_URI . '/js/mav-ajax-load-posts.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-ajax-form',
            TEMPLATE_URI . '/js/mav-ajax-form.js',
            false,
            '1.0.0',
            true
        );

        /**
        * Maverick Theme Scripts
        */
        wp_enqueue_script(
            'mavericktheme-scripts',
            TEMPLATE_URI . '/js/maverick-scripts.js',
            array('jquery'),
            '1.0.0',
            true
        );
    endif;

}
add_action( 'wp_enqueue_scripts', 'mavf_enqueue_scripts' );