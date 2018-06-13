<?php
/*
 * @package mavericktheme
 */

/*
 * Theme Support - Post Formats
 */
$mavSavedValue = get_option('mav_setting_post_format');
$mavPostFormats = array( 'aside' ,
						 'gallery' ,
						 'link' ,
						 'image' ,
						 'quote' ,
						 'status' ,
						 'video' ,
						 'audio' ,
						 'chat' );
$mavOutput = array();

foreach ($mavPostFormats as $mavPostFormat) {
	$mavOutput[] = ( @$mavSavedValue[$mavPostFormat] == 1 ? $mavPostFormat : '');
}

if ( !empty($mavSavedValue) ) {
	add_theme_support('post-formats' , $mavOutput );
}

/*
 * Theme Support - Feature Image
 */
add_theme_support( 'post-thumbnails' );

/*
 * Theme Support - Feature Image
 */
add_theme_support( 'html5', array(
	'comment-list',
	'comment-form',
	'search-form',
	'gallery',
	'caption'
) );

/*
 * Theme Support - Custom Logo
 */
add_theme_support( 'custom-logo' , array(
	'width' => 80,
	'height' => 80,
	'flex-width' => false,
	'flex-height' => false,'header-text' => array(
		'site-title',
		'site-description' ),
	) );

/*
 * Theme Support - Navigation Menus
 */
function mavf_register_nav_menus() {
	register_nav_menu('primary_menu' , 		'Main menu');
	register_nav_menu('secondary_menu' , 	'Secondary/Footer menu');
	register_nav_menu('sticky_menu' , 		'Sticky menu');
	register_nav_menu('side_menu' , 		'Side menu');
}

add_action('after_setup_theme' , 'mavf_register_nav_menus');

/*
 * Theme Support - Sidebars
 */
function mavf_register_sidebars() {

	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/
		$mavMainSidebar = array(
			'name'          => 'Main Sidebar',
			'id'            => 'mavid-sidebar-main',
			'description'   => 'Main Sidebar',
			'class'         => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);

		register_sidebar( $mavMainSidebar );
}

add_action( 'widgets_init', 'mavf_register_sidebars' );

// function mavf_mobile_detect() {
// 	global $mavMobileDetect;
// 	$mavMobileDetect = new Mobile_Detect;
// }

// add_action('after_setup_theme' , 'mavf_mobile_detect');

function mavf_mobile_detect(){
    $mavDeviceDetect = new Mobile_Detect;
    $mavDevice = 'desktop';

    if ( $mavDeviceDetect->isMobile() ) {
        $mavDevice = 'mobile';
    }
    if ( $mavDeviceDetect->isTablet() ) {
        $mavDevice = 'tablet';
    }
    return $mavDevice;
}

/**
 * Test local SMTP Mail Server
 * Note: Remove this function in production site
 */

function mailtrap($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '413cfbd302af9e';
    $phpmailer->Password = '1ba3c17307cb25';
  }
add_action('phpmailer_init', 'mailtrap');