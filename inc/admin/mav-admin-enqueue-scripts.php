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
        THEME_DIR . '/js/vendor/jquery-3.3.1.min.js',
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
        THEME_DIR . '/js/mav-helpers.js',
        false,
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'mavericktheme-count-down',
        THEME_DIR . '/js/mav-count-down.js',
        false,
        '1.0.0',
        true
    );

    $mavMaintenance = esc_attr(get_option('mav_setting_maintenance'));

    if (empty($mavMaintenance)) :

        // Type Writter
        wp_enqueue_script(
            'mavericktheme-type-writter',
            THEME_DIR . '/js/mav-type-writter.js',
            false,
            '1.0.0',
            true
        );

        // Sliders
        wp_enqueue_script(
            'mavericktheme-slider',
            THEME_DIR . '/js/mav-slider.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-carousel',
            THEME_DIR . '/js/mav-carousel.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-lightbox',
            THEME_DIR . '/js/mav-lightbox.js',
            false,
            '1.0.0',
            true
        );

        /* Header Menu */
        wp_enqueue_script(
            'mavericktheme-header-menu',
            THEME_DIR . '/js/mav-header-menu.js',
            false,
            '1.0.0',
            true
        );

        /* Ajax load posts */
        wp_enqueue_script(
            'mavericktheme-ajax-load-posts',
            THEME_DIR . '/js/mav-ajax-load-posts.js',
            false,
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'mavericktheme-ajax-form',
            THEME_DIR . '/js/mav-ajax-form.js',
            false,
            '1.0.0',
            true
        );

        /**
        * Maverick Theme Scripts
        */
        wp_enqueue_script(
            'mavericktheme-scripts',
            THEME_DIR . '/js/maverick-scripts.js',
            array('jquery'),
            '1.0.0',
            true
        );
    endif;

}
add_action('wp_enqueue_scripts', 'mavf_enqueue_scripts');