<?php
/**
 * @package mavericktheme
 */

function mavf_enqueue_styles()
{
    // Web Font Roboto by Google Font
    wp_enqueue_style(
        'mavcss-roboto',
        'https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,400i,500,700,900&subset=vietnamese',
        array(),
        '1.0.0',
        'all'
    );

    // Web Font Roboto Condensed by Google Font
    wp_enqueue_style(
        'mavcss-roboto-condensed',
        'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=vietnamese',
        array(),
        '1.0.0',
        'all'
    );

    // Web Font Roboto Slab by Google Font
    wp_enqueue_style(
        'mavcss-roboto-slab',
        'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&subset=vietnamese',
        array(),
        '1.0.0',
        'all'
    );

    // Roboto Mono
    wp_enqueue_style(
        'mavcss-roboto-mono',
        'https://fonts.googleapis.com/css?family=Roboto+Mono:100,300,400,500,700&amp;subset=vietnamese',
        array(),
        '1.0.0',
        'all'
    );

    // Web Font Alfa Slab One by Google Font
    wp_enqueue_style(
        'mavcss-alfa-slab-one',
        'https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;subset=vietnamese',
        array(),
        '1.0.0',
        'all'
    );

    // Web Font Font Awesome
    // CDN
    // wp_enqueue_style('mavcss-font-awesome', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css', array() , '5.0.9' , 'all');

    // Local
    wp_enqueue_style(
        'mavcss-font-awesome',
        get_template_directory_uri().'/css/fontawesome-all.css',
        array(),
        '5.0.13',
        'all'
    );

    // Main Maverick Theme CSS
    wp_enqueue_style(
        'mavcss-mavericktheme-styles',
        get_template_directory_uri().'/css/maverick-styles.css',
        array(),
        '1.0.0',
        'all'
    );
}
add_action( 'wp_enqueue_scripts', 'mavf_enqueue_styles' );