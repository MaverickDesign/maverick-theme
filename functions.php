<?php
/**
 * @package mavericktheme
*/

// Use for HTML sources
// Eg: http://localhost/maverick.vn/wp-content/themes/mavericktheme
define( "THEME_DIR", get_template_directory_uri() );
// Use for PHP sources
// Eg: D:\_Projects\www\maverick.vn/wp-content/themes/mavericktheme
define( "TEMPLATE_DIR", get_template_directory() );

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

        if ($mav_device_detect->isMobile()) {
            $mav_device = 'mobile';
        }
        if ($mav_device_detect->isTablet()) {
            $mav_device = 'tablet';
        }
        return $mav_device;
    }
}

/**
 * Admin Functions
 */

require TEMPLATE_DIR. '/inc/admin/mav-admin-functions.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-theme-supports.php';

require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-styles.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-scripts.php';

// Social Accounts
require TEMPLATE_DIR.'/inc/mav-social-accounts.php';

// Return if maintenance mode is enable
if ( get_option( 'mav_setting_maintenance' ) ) {
    return;
}

// Custom post types
require TEMPLATE_DIR. '/inc/admin/mav-admin-cpt.php';

/**
 * Theme Functions
 */

require TEMPLATE_DIR. '/inc/mav-walker-nav.php';

require TEMPLATE_DIR. '/inc/mav-breadcrumbs.php';

require TEMPLATE_DIR. '/inc/mav-ajax-load-posts.php';

// Post Query
require TEMPLATE_DIR. '/inc/mav-post-query.php';

require TEMPLATE_DIR. '/inc/mav-google-map.php';

// Sliders
require TEMPLATE_DIR.'/inc/mav-slider.php';

// Carousel
require TEMPLATE_DIR.'/inc/mav-carousel.php';

require TEMPLATE_DIR. '/inc/mav-post-grid.php';

require TEMPLATE_DIR. '/inc/mav-post-feature.php';

require TEMPLATE_DIR. '/inc/mav-items-grid.php';

require TEMPLATE_DIR. '/inc/mav-ajax-form.php';

require TEMPLATE_DIR. '/inc/mav-post-accordion.php';

require TEMPLATE_DIR. '/inc/mav-post-modal.php';

require TEMPLATE_DIR. '/inc/mav-tab-view.php';

require TEMPLATE_DIR. '/inc/mav-content-modify.php';

require TEMPLATE_DIR. '/inc/mav-form.php';

require TEMPLATE_DIR. '/inc/mav-misc.php';