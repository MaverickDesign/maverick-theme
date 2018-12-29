<?php
/**
 * @package mavericktheme
*/

// Use for HTML sources
// Eg: http://localhost/maverick.vn/wp-content/themes/mavericktheme
define( "TEMPLATE_URI", get_template_directory_uri() );

// Use for PHP sources
// Eg: D:\_Projects\www\maverick.vn/wp-content/themes/mavericktheme
define( "TEMPLATE_DIR", get_template_directory() );

remove_filter( 'the_content', 'wpautop' );

/* Remove Generator Meta Tag */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Vendors
 */
if ( file_exists( TEMPLATE_DIR.'/vendor/Mobile_Detect.php' ) )
{

    include_once TEMPLATE_DIR.'/vendor/Mobile_Detect.php';

    function mavf_mobile_detect()
    {
        $mav_device_detect = new Mobile_Detect;
        $mav_device = 'desktop';

        if ( $mav_device_detect->isMobile() ) {
            $mav_device = 'mobile';
        }

        if ( $mav_device_detect->isTablet() ) {
            $mav_device = 'tablet';
        }

        return $mav_device;
    }
}

/**
 * Admin Functions
 */

// Admin functions
require TEMPLATE_DIR. '/inc/admin/mav-admin-functions.php';

// Theme support
require TEMPLATE_DIR. '/inc/admin/mav-admin-theme-supports.php';

// Enqueue styles
require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-styles.php';

// Enqueue scripts
require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-scripts.php';

// Social Accounts
require TEMPLATE_DIR.'/inc/mav-social-accounts.php';

// Custom post types
require TEMPLATE_DIR. '/inc/admin/mav-admin-cpt.php';

// Header Menu Walker
require TEMPLATE_DIR. '/inc/mav-walker-nav.php';

// BreadCrumbs
require TEMPLATE_DIR. '/inc/mav-breadcrumbs.php';

require TEMPLATE_DIR. '/inc/mav-ajax-load-posts.php';

// Post Query
require TEMPLATE_DIR. '/inc/mav-post-query.php';

// Google Map
require TEMPLATE_DIR. '/inc/mav-google-map.php';

// Sliders
if ( file_exists( TEMPLATE_DIR.'/inc/mav-slider.php' ) )
{
    include TEMPLATE_DIR.'/inc/mav-slider.php';
}

// Uni Sliders
if ( file_exists( TEMPLATE_DIR.'/inc/mav-uni-slider.php' ) )
{
    include TEMPLATE_DIR.'/inc/mav-uni-slider.php';
}

// Carousel
require TEMPLATE_DIR.'/inc/mav-carousel.php';

// Post Grid
require TEMPLATE_DIR. '/inc/mav-post-grid.php';

// Featured Post
require TEMPLATE_DIR. '/inc/mav-post-feature.php';

require TEMPLATE_DIR. '/inc/mav-items-grid.php';

require TEMPLATE_DIR. '/inc/mav-ajax-form.php';

// Post Accordion
require TEMPLATE_DIR. '/inc/mav-post-accordion.php';

// Post Modal
require TEMPLATE_DIR. '/inc/mav-post-modal.php';

// Post Tab View
require TEMPLATE_DIR. '/inc/mav-tab-view.php';

require TEMPLATE_DIR. '/inc/mav-content-modify.php';

require TEMPLATE_DIR. '/inc/mav-form.php';

require TEMPLATE_DIR. '/inc/mav-misc.php';
