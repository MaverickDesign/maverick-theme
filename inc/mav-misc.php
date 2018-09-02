<?php
/**
 * @package mavericktheme
 */

/**
 * Maverick Logo Background
 * Usage: On HTML element
 */

function mavf_logo_bg( $logo_back, $logo_mark = '255,255,255,1', $logo_typo = '255,255,255,0' )
{
    if ( ! isset( $logo_back ) ) {
        $logo_back = '193,49,34,1';
    }
    printf(
        'style="background: rgba(%2$s) url(%1$s/assets/brand-logo.php?back=%2$s&mark=%3$s&typo=%4$s) center no-repeat;"',
        esc_url( get_template_directory_uri() ), $logo_back, $logo_mark, $logo_typo
    );
};

function mavf_get_logo_bg( $logo_back, $logo_mark = '255,255,255,1', $logo_typo = '255,255,255,0' )
{
    if ( ! isset( $logo_back ) ) {
        $logo_back = '193,49,34,1';
    }
    return sprintf(
        'style="background: rgba(%2$s) url(%1$s/assets/brand-logo.php?back=%2$s&mark=%3$s&typo=%4$s) center no-repeat;"',
        esc_url( get_template_directory_uri() ), $logo_back, $logo_mark, $logo_typo
    );
};

function mavf_brand_logo_background( $mav_get = false, $mav_logo_back = '193,49,34,1', $mav_logo_mark = '255,255,255,1', $mav_logo_typo = '255,255,255,0' )
{
    if ( ! file_exists( get_template_directory() . '/assets/brand-logo.php') ) {
        return;
    }
    $mav_output = sprintf(
        'style="background: rgba(%2$s) url(%1$s/assets/brand-logo.php?back=%2$s&mark=%3$s&typo=%4$s) center no-repeat;"',
        esc_url( get_template_directory_uri() ), $mav_logo_back, $mav_logo_mark, $mav_logo_typo
    );
    if ( ! $mav_get) {
        echo $mav_output;
    } else {
        return $mav_output;
    }
}

/**
 * Get post thumbnail URL
 * Usage: On HTML element
 */

function mavf_post_thumbnail_url($mav_size = 'full')
{
    $featured_img_url = esc_url(get_the_post_thumbnail_url(get_the_ID(),$mav_size));
    printf('style="background: url(%1$s);"', $featured_img_url);
}

function mavf_get_post_thumbnail_url($mav_size = 'full')
{
    $featured_img_url = esc_url(get_the_post_thumbnail_url(get_the_ID(), $mav_size));
    return sprintf('style="background: url(%1$s);"', $featured_img_url);
}

/**
 * Custom Excerpt Length
 */

function mavf_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'mavf_custom_excerpt_length', 999);

/**
 * Display Single Default Category Link
 *
 * @return void
 */
function mavf_single_category()
{
    $mav_categories = get_the_category();
    if (!empty($mav_categories)) {
        return sprintf('<a href="%1$s">%2$s</a>', esc_url(get_category_link($mav_categories[0]->term_id)), esc_html($mav_categories[0]->name));
    }
}

function mavf_get_single_category()
{
    $mav_categories = get_the_category();
    if (!empty($mav_categories)) {
        return esc_html($mav_categories[0]->name);
    }
}

/**
 * Message Box
 *
 * @param string $mavMessage
 * @param string $mavIcon
 * @param boolean $mavCloseJS
 * @return void
 */

function mavf_message_box($mavMessage = 'Thông báo', $mavIcon = 'fa-exclamation-circle', $mavCloseJS = true)
{
    /**
     * This class is on the element to remove from the DOM
     * Default is on the top element of the message box
     */
    if ($mavCloseJS) {
        $mavCloseClass = ' mavjs-close';
    }

    printf('<div aria-hidden="true" class="mav-message-box-wrapper%1$s">', $mavCloseClass);
        printf('<div class="mav-message-box-ctn">');
            printf('<span class="fas %1$s"></span>', $mavIcon);
            printf('<p class="mav-message-content">%1$s</p>', $mavMessage);
            printf(
                '<span class="mav-btn-close" title="%1$s"></span>',
                __('Đóng thông báo', 'mavericktheme')
            );
        echo '</div>';
    echo '</div>';
}

function my_theme_archive_title( $title )
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
}
add_filter('get_the_archive_title', 'my_theme_archive_title');

/**
 * Button
 *
 * @param string $mavText
 * @param string $mavLink
 * @param string $mavStyle
 * @return void
 */

function mavf_button( $mavText = '', $mavLink = '', $mavStyle = 'mav-btn-primary' )
{
    if ( empty($mavText) ) {
        $mavText = __( 'Button Text', 'mavericktheme' );
    }
    printf(
        '<button type="button" title="%1$s" class="%3$s"><a href="%2$s">%1$s</a></button>',
        $mavText, $mavLink, $mavStyle
    );
};

/**
 * Make Unique String
 *
 * @param integer $mavLength
 * @param string $mavExp
 * @return void
 */

function mavf_unique($mavLength = 0, $mavExp = 's')
{
    $mavNonce = wp_create_nonce(date($mavExp));

    $mavString = hash('sha512', $mavNonce);

    if ($mavLength > 0) {
        $mavStringLength = strlen($mavString);
        $mavReturn = substr($mavString, floor(rand(0, 10)), $mavStringLength - ($mavStringLength - $mavLength));
    } else {
        $mavReturn = $mavString;
    }
    return esc_html($mavReturn);
}