<?php
/*
    @package mavericktheme
*/
define( "THEME_DIR", get_template_directory_uri() );
// Eg: http://localhost/maverick.vn/wp-content/themes/maverick-theme
define( "TEMPLATE_DIR", get_template_directory() );
// Eg: D:\_Projects\www\maverick.vn/wp-content/themes/maverick-theme

/* Remove Generator Meta Tag */
remove_action( 'wp_head', 'wp_generator' );

require TEMPLATE_DIR. '/inc/admin/mav-admin-functions.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-theme-supports.php';

require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-styles.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-scripts.php';

require TEMPLATE_DIR. '/inc/mav-breadcrumbs.php';

require TEMPLATE_DIR.'/inc/mav-social-accounts.php';

require TEMPLATE_DIR.'/inc/mav-slider.php';
require TEMPLATE_DIR.'/inc/mav-carousel.php';

require TEMPLATE_DIR. '/inc/mav-post-grid.php';
require TEMPLATE_DIR. '/inc/mav-post-feature.php';
// require get_template_directory() . '/inc/mav-post-carousel.php';

require TEMPLATE_DIR. '/inc/mav-google-map.php';

/*
 * Functions
 */

/*
 * Maverick Logo Background
 * Usage: On HTML element
 */

function mavf_logo_bg($logo_back='193,49,34,1', $logo_mark='255,255,255,1', $logo_typo='255,255,255,0') {
    printf(
        sprintf('style="background: rgba(%2$s) url(%1$s/assets/maverick-logo-svg.php?back=%2$s&mark=%3$s&typo=%4$s) center no-repeat;"', esc_url(get_template_directory_uri()),$logo_back, $logo_mark, $logo_typo)
    );
};

/*
 * Get post thumbnail URL
 * Usage: On HTML element
 */

function mavf_post_thumbnail_url($mav_size = 'full') {
    $featured_img_url = esc_url(get_the_post_thumbnail_url(get_the_ID(),$mav_size));
    printf(sprintf('style="background: url(%1$s);"', $featured_img_url));
}

function mavf_get_post_thumbnail_url($mav_size = 'full') {
    $featured_img_url = esc_url(get_the_post_thumbnail_url(get_the_ID(),$mav_size));
    return sprintf('style="background: url(%1$s);"', $featured_img_url);
}

/*
 * Custom Excerpt Length
 */

function mavf_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'mavf_custom_excerpt_length', 999 );

/*
 * Display Single Default Category Link
 */

function mavf_single_category() {
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        return sprintf('<a href="%1$s">%2$s</a>', esc_url( get_category_link( $categories[0]->term_id ) ), esc_html( $categories[0]->name ));
    }
}

function mavf_get_single_category() {
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        return esc_html( $categories[0]->name );
    }
}

/*
 * Message Box
 */

function mavf_message_box($mavMessage = 'Thông báo',$mavCloseJS = true) {
    /*
     * This class is on the element to remove from the DOM
     * Default is on the top element of the message box
     */
    if ($mavCloseJS) {
        $mavCloseClass = ' mavjs-close';
    }
    printf(
        sprintf('<div aria-hidden="true" class="mav-message-box-ctn%1$s">',
        $mavCloseClass)
    );
        echo '<div class="mav-message-box-wrapper">';
            printf(
                sprintf('<span class="fas fa-exclamation-triangle"></span>')
            );
            printf(
                sprintf('<span class="mav-message-content">%1$s</span>',
                $mavMessage)
            );
            printf(
                sprintf('<span class="mav-btn-close" title="Đóng"></span>')
            );
        echo '</div>';
    echo '</div>';
}

/*
 */

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/*
 * Button
 */

function mavf_button($mavText,$mavLink = '', $mavStyle = 'mav-btn-solid') {
    printf(sprintf('<div class="mav-btn-ctn">'));
    printf(sprintf('<a href="%2$s" title="%1$s" style="text-decoration: none;"><button class="%3$s">%1$s</button></a>',$mavText,$mavLink,$mavStyle));
    printf(sprintf('</div>'));
};

function mavf_unique($mavLength = 0, $mavExp = s){

    $mavNonce = wp_create_nonce(date($mavExp));

    $mavString = hash('sha512',$mavNonce);

    if ($mavLength > 0) {
        $mavStringLength = strlen($mavString);
        $mavReturn = substr($mavString, 0 , $mavStringLength - ($mavStringLength - $mavLength) );
    } else {
        $mavReturn = $mavString;
    }
    return esc_html($mavReturn);
}