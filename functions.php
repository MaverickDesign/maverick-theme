<?php
/**
    @package mavericktheme
*/

// Use for HTML sources
// Eg: http://localhost/maverick.vn/wp-content/themes/maverick-theme
define( "THEME_DIR", get_template_directory_uri() );
// Use for PHP sources
// Eg: D:\_Projects\www\maverick.vn/wp-content/themes/maverick-theme
define( "TEMPLATE_DIR", get_template_directory() );

/* Remove Generator Meta Tag */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Vendors
 */
if (file_exists(TEMPLATE_DIR . '/vendor/Mobile_Detect.php')) {
    require_once TEMPLATE_DIR . '/vendor/Mobile_Detect.php';
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
}

/**
 * Admin
 */

require TEMPLATE_DIR. '/inc/admin/mav-admin-functions.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-theme-supports.php';

require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-styles.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-scripts.php';

require TEMPLATE_DIR. '/inc/admin/mav-admin-cpt.php';

/*
 * Theme Functions
 */

require TEMPLATE_DIR. '/inc/mav-walker-nav.php';

require TEMPLATE_DIR. '/inc/mav-breadcrumbs.php';

require TEMPLATE_DIR. '/inc/mav-ajax-load-posts.php';

require TEMPLATE_DIR.'/inc/mav-social-accounts.php';

require TEMPLATE_DIR.'/inc/mav-slider.php';

require TEMPLATE_DIR.'/inc/mav-carousel.php';

require TEMPLATE_DIR. '/inc/mav-post-grid.php';

require TEMPLATE_DIR. '/inc/mav-post-feature.php';

require TEMPLATE_DIR. '/inc/mav-google-map.php';

require TEMPLATE_DIR. '/inc/mav-items-grid.php';

require TEMPLATE_DIR. '/inc/mav-ajax-form.php';

require TEMPLATE_DIR. '/inc/mav-content-modify.php';

require TEMPLATE_DIR. '/inc/mav-misc.php';