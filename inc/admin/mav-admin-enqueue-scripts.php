<?php
/*
 * @package mavericktheme
 */

function mavf_enqueue_scripts() {

    /*
     * jQuery
     */
	wp_deregister_script('jquery');
	wp_register_script('jquery' , THEME_DIR . '/js/vendor/jquery-3.3.1.min.js' , false , '3.3.1' , true);
	wp_enqueue_script('jquery');

    /*
     * Enqueue Maverick Scripts
     */
	wp_enqueue_script('maverick-theme-helpers',			THEME_DIR . '/js/mav-helpers.js', 		false,				'1.0.0',	true);
	wp_enqueue_script('maverick-theme-type-writter',	THEME_DIR . '/js/mav-type-writter.js',	false,				'1.0.0',	true);
	wp_enqueue_script('maverick-theme-count-down',		THEME_DIR . '/js/mav-count-down.js',	false,				'1.0.0',	true);
	wp_enqueue_script('maverick-theme-slider',			THEME_DIR . '/js/mav-slider.js',		false,				'1.0.0',	true);
	wp_enqueue_script('maverick-theme-carousel',		THEME_DIR . '/js/mav-carousel.js',		false,				'1.0.0',	true);
	wp_enqueue_script('maverick-theme-lightbox',		THEME_DIR . '/js/mav-lightbox.js',		false,				'1.0.0',	true);
	/*
	 * Header Menu
	 */
	wp_enqueue_script('maverick-theme-header-menu',		THEME_DIR . '/js/mav-header-menu.js',	false,				'1.0.0',	true);
	/*
	 * Ajax load posts
	 */
	wp_enqueue_script('maverick-theme-ajax-load-posts',		THEME_DIR . '/js/mav-ajax-load-posts.js',	false,				'1.0.0',	true);

	wp_enqueue_script('maverick-theme-ajax-form',		THEME_DIR . '/js/mav-ajax-form.js',	false,				'1.0.0',	true);
	/*
	 * Maverick Theme Scripts
	 */
	wp_enqueue_script('maverick-theme-scripts',			THEME_DIR . '/js/maverick-scripts.js',	array('jquery'),	'1.0.0',	true);

}

/*
 * Load Scripts
 */
add_action( 'wp_enqueue_scripts' , 'mavf_enqueue_scripts');