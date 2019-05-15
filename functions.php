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
if ( file_exists( TEMPLATE_DIR.'/vendor/Mobile_Detect.php' ) ) {

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


$mav_theme_features = get_option('mav_setting_theme_features');

if ( !empty($mav_theme_features) ) {
    foreach ( $mav_theme_features as $slug=>$mav_theme_feature ) {
        if ( file_exists( TEMPLATE_DIR.'/inc/mav-'.$slug.'.php' ) ) {
            include TEMPLATE_DIR.'/inc/mav-'.$slug.'.php';
        }
    }
}

require TEMPLATE_DIR. '/inc/mav-items-grid.php';

require TEMPLATE_DIR. '/inc/mav-ajax-form.php';

require TEMPLATE_DIR. '/inc/mav-form.php';

require TEMPLATE_DIR. '/inc/mav-misc.php';
