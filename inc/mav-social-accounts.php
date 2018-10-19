<?php
/**
 * @package mavericktheme
 */

// Get social account info from JSON file
$mav_file_path = TEMPLATE_DIR . '/inc/mav-social-accounts.json';

if ( file_exists( $mav_file_path ) ) {
    $mav_json = json_decode( file_get_contents( $mav_file_path ), true );
} else {
    return;
}

/**
 * Social Account - li element
 *
 * @param [type] $mav_account
 * @param [type] $mav_href
 * @param [type] $mav_class
 * @param [type] $mav_title
 * @param [type] $mav_fa_class
 * @return void
 */

function mavf_social_account( $mav_account, $mav_href, $mav_class, $mav_title , $mav_fa_class )
{
    printf(
        '<li class="%3$s"><a href="%2$s%1$s" class="%5$s" title="%4$s" target="_blank"></a></li>',
        $mav_account , $mav_href, $mav_class , $mav_title , $mav_fa_class
    );
}

/**
 * Social Links
 *
 * @param boolean $mav_full
 * @param string $mav_ul_class
 * @param string $mav_class
 * @return void
 */
function mavf_social_links( $mav_full = false, $mav_ul_class = "mav-social-links", $mav_class = "mav-social-icon" )
{
    printf( '<ul class="%1$s">', $mav_ul_class );
    /**
     * Brand Contact Info
     */
    if ( $mav_full ) {
        // Phone Number
        $mav_brand_phone_number = esc_attr( get_option( 'mav_setting_brand_phone' ) );
        if ( !empty( $mav_brand_phone_number ) ) {
            mavf_social_account(
                $mav_brand_phone_number,
                'tel:',
                $mav_class,
                'Phone',
                'fa fa-phone'
            );
        }
        // Email
        $mav_brand_contact_email = esc_attr( get_option( 'mav_setting_brand_email' ) );
        if ( !empty( $mav_brand_contact_email ) ) {
            mavf_social_account(
                $mav_brand_contact_email,
                'mailto:',
                $mav_class,
                'Email',
                'fa fa-envelope'
            );
        }
    }

    $mav_brand_name = esc_html( get_bloginfo( 'name' ) ).__( ' trên ', 'mavericktheme' );

    /**
     * Social Accounts
     */

    global $mav_json;

    foreach ( $mav_json["accounts"] as $mav_account ) {
        $mav_account_name = esc_attr( get_option( $mav_account['option'] ) );
        if ( !empty( $mav_account_name ) ) {
            mavf_social_account(
                $mav_account_name,
                $mav_account['url'],
                $mav_class,
                $mav_brand_name.$mav_account['name'],
                $mav_account['icon']
            );
        }
    }
    echo '</ul>';
}

function mavf_social_links_name() {
    $mav_social_accounts = [];
    // Facebook
    $facebook_acc = esc_attr( get_option( 'mav_setting_social_account_facebook' ) );
    if ( !empty( $facebook_acc ) ) {
        array_push( $mav_social_accounts, 'Facebook' );
    }
    // Google Plus
    $googleplus_acc = esc_attr( get_option( 'mav_setting_social_account_google_plus' ) );
    if ( !empty( $googleplus_acc ) ) {
        array_push( $mav_social_accounts, 'Google Plus' );
    }
    return $mav_social_accounts;
}

/**
 * Check social account settings
 */
function mavf_check_social_accounts() {
    global $mav_json;
    $mav_has_accounts = false;
    if ( !empty( $mav_json ) ) {
        foreach ( $mav_json["accounts"] as $mav_account ) {
            $mav_social_account = esc_attr( get_option( $mav_account['option'] ) );
            if ( !empty( $mav_social_account ) ) {
                $mav_has_accounts = true;
            }
        }
    }
    return $mav_has_accounts;
}
