<?php
/**
 * @package maverick-theme
 */

/* Facebook */
register_setting('mavog_site_setting', 'mav_setting_social_account_facebook');
add_settings_field('mavid_site_setting_social_account_facebook', 'Facebook', 'mavf_site_setting_social_account_facebook', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account');

function mavf_site_setting_social_account_facebook() {
    $mavSavedValue = esc_attr(get_option('mav_setting_social_account_facebook'));
    printf('<input type="text" name="mav_setting_social_account_facebook" value="%s" placeholder="Facebook account"/>', $mavSavedValue);
}

/* Google+ */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_google_plus' );
add_settings_field( 'mavid_site_setting_social_account_google_plus', 'Google+', 'mavf_site_setting_social_account_google_plus', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_google_plus() {
    $mavSavedValue = esc_attr( get_option('mav_setting_social_account_google_plus') );
    printf( '<input type="text" name="mav_setting_social_account_google_plus" value="%s" placeholder="Google+ account"/>', $mavSavedValue );
}

/* Twitter */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_twitter' );
add_settings_field( 'mavid_site_setting_social_account_twitter', 'Twitter', 'mavf_site_setting_social_account_twitter', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_twitter() {
    $mavSavedValue = esc_attr( get_option('mav_setting_social_account_twitter') );
    printf( '<input type="text" name="mav_setting_social_account_twitter" value="%s" placeholder="Twitter account"/>', $mavSavedValue );
}

/* Youtube */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_youtube' );
add_settings_field( 'mavid_site_setting_social_account_youtube', 'Youtube', 'mavf_site_setting_social_account_youtube', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_youtube() {
    $mavSavedValue = esc_attr( get_option('mav_setting_social_account_youtube') );
    printf( '<input type="text" name="mav_setting_social_account_youtube" value="%s" placeholder="Youtube account"/>', $mavSavedValue );
}

/* Linkedin */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_linkedin' );
add_settings_field( 'mavid_site_setting_social_account_linkedin', 'Linkedin', 'mavf_site_setting_social_account_linkedin', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_linkedin() {
    $mavSavedValue = esc_attr( get_option('mav_setting_social_account_linkedin') );
    printf( '<input type="text" name="mav_setting_social_account_linkedin" value="%s" placeholder="Linkedin account"/>', $mavSavedValue );
}

/* Flickr */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_flickr' );
add_settings_field( 'mavid_site_setting_social_account_flickr', 'Flickr', 'mavf_site_setting_social_account_flickr', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_flickr() {
    $mavSavedValue = esc_attr( get_option('mav_setting_social_account_flickr') );
    printf( '<input type="text" name="mav_setting_social_account_flickr" value="%s" placeholder="Flickr account"/>', $mavSavedValue );
}

/* Instagram */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_instagram' );
add_settings_field( 'mavid_site_setting_social_account_instagram', 'Instagram', 'mavf_site_setting_social_account_instagram', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_instagram() {
    $mavSavedValue = esc_attr( get_option('mav_setting_social_account_instagram') );
    printf( '<input type="text" name="mav_setting_social_account_instagram" value="%s" placeholder="Instagram account"/>', $mavSavedValue );
}