<?php
/**
 * @package mavericktheme
 */

/**
 * Theme Support - Post Formats
 */
$mav_saved_value = get_option( 'mav_setting_post_format' );

$mav_post_formats = array(
    'aside' ,
    'gallery' ,
    'link' ,
    'image' ,
    'quote' ,
    'status' ,
    'video' ,
    'audio' ,
    'chat'
);

$mav_output = array();

foreach ( $mav_post_formats as $mav_post_format ) {
    $mav_output[] = ( @$mav_saved_value[$mav_post_format] == 1 ? $mav_post_format : '' );
}

if ( ! empty( $mav_saved_value ) ) {
    add_theme_support( 'post-formats', $mav_output );
}

/**
 * Theme Support - Feature Image
 */
add_theme_support( 'post-thumbnails' );

/**
 * Theme Support - HTML5
 */
add_theme_support(
    'html5',
    array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    )
);

/**
 * Theme Support - Custom Logo
 */
add_theme_support(
    'custom-logo',
    array(
        'width'         => 80,
        'height'        => 80,
        'flex-width'    => false,
        'flex-height'   => false,
        'header-text'   => array(
                            'site-title',
                            'site-description'
                        ),
    )
);

/**
 * Theme Support - Navigation Menus
 *
 * @return void
 */

function mavf_register_nav_menus()
{
    register_nav_menu( 'primary_menu', __( 'Main menu/Header Menu', 'mavericktheme' ) );
    register_nav_menu( 'secondary_menu', __( 'Secondary/Footer menu', 'mavericktheme' ) );
}
add_action( 'after_setup_theme', 'mavf_register_nav_menus' );

/**
 * Theme Support - Sidebars
 *
 * @return void
 */

function mavf_register_sidebars()
{
    /**
    * Creates a sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $mav_main_sidebar = array(
        'name'          => 'Main Sidebar',
        'id'            => 'mavid-sidebar-main',
        'description'   => 'Main Sidebar',
        'class'         => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    );
    register_sidebar( $mav_main_sidebar );
}
add_action( 'widgets_init', 'mavf_register_sidebars' );

/**
 * Test local SMTP Mail Server
 * Note: Remove this function in production site
 */

function mailtrap( $phpmailer )
{
    $phpmailer->isSMTP();
    $phpmailer->Host        = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth    = true;
    $phpmailer->Port        = 2525;
    $phpmailer->Username    = '413cfbd302af9e';
    $phpmailer->Password    = '1ba3c17307cb25';
}

if ( get_option( 'mav_setting_dev_mode' ) ) {
    add_action( 'phpmailer_init', 'mailtrap' );
}