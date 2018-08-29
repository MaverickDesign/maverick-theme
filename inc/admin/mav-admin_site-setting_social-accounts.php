<?php
/**
 * @package maverick-theme
 */

// Social Settings Section
add_settings_section(
    'mavsec_site_setting_social_account',
    __('Tài khoản mạng xã hội', 'maverick-theme'),
    'mavf_site_setting_social_account',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_social_account()
{
    _e('Thiết lập thông tin tài khoản mạng xã hội', 'maverick-theme');
}

// Facebook
register_setting(
    'mavog_site_setting',
    'mav_setting_social_account_facebook'
);
add_settings_field(
    'mavid_site_setting_social_account_facebook',
    'Facebook',
    'mavf_site_setting_social_account_facebook',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_account'
);

function mavf_site_setting_social_account_facebook()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_social_account_facebook'));
    printf('<input type="text" name="mav_setting_social_account_facebook" value="%1$s" placeholder="%2$s"/>', $mav_saved_value, __('Facebook account', 'maverick-theme'));
}

/* Google+ */
register_setting(
    'mavog_site_setting',
    'mav_setting_social_account_google_plus'
);
add_settings_field(
    'mavid_site_setting_social_account_google_plus',
    'Google+',
    'mavf_site_setting_social_account_google_plus',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_account'
);

function mavf_site_setting_social_account_google_plus()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_social_account_google_plus'));
    printf('<input type="text" name="mav_setting_social_account_google_plus" value="%1$s" placeholder="Google+ account"/>', $mav_saved_value);
}

/* Twitter */
register_setting(
    'mavog_site_setting',
    'mav_setting_social_account_twitter'
);
add_settings_field(
    'mavid_site_setting_social_account_twitter',
    'Twitter',
    'mavf_site_setting_social_account_twitter',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_account'
);

function mavf_site_setting_social_account_twitter()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_social_account_twitter'));
    printf('<input type="text" name="mav_setting_social_account_twitter" value="%1$s" placeholder="Twitter account"/>', $mav_saved_value);
}

/* Youtube */
register_setting(
    'mavog_site_setting',
    'mav_setting_social_account_youtube'
);
add_settings_field(
    'mavid_site_setting_social_account_youtube',
    'Youtube',
    'mavf_site_setting_social_account_youtube',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_account'
);

function mavf_site_setting_social_account_youtube()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_social_account_youtube'));
    printf('<input type="text" name="mav_setting_social_account_youtube" value="%1$s" placeholder="Youtube account"/>', $mav_saved_value);
}

/* Linkedin */
register_setting(
    'mavog_site_setting',
    'mav_setting_social_account_linkedin'
);
add_settings_field(
    'mavid_site_setting_social_account_linkedin',
    'Linkedin',
    'mavf_site_setting_social_account_linkedin',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_account'
);

function mavf_site_setting_social_account_linkedin()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_social_account_linkedin'));
    printf('<input type="text" name="mav_setting_social_account_linkedin" value="%1$s" placeholder="Linkedin account"/>', $mav_saved_value);
}

/* Flickr */
register_setting(
    'mavog_site_setting',
    'mav_setting_social_account_flickr'
);
add_settings_field(
    'mavid_site_setting_social_account_flickr',
    'Flickr',
    'mavf_site_setting_social_account_flickr',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_account'
);

function mavf_site_setting_social_account_flickr()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_social_account_flickr'));
    printf('<input type="text" name="mav_setting_social_account_flickr" value="%1$s" placeholder="Flickr account"/>', $mav_saved_value);
}

/* Instagram */
register_setting( 'mavog_site_setting', 'mav_setting_social_account_instagram' );
add_settings_field( 'mavid_site_setting_social_account_instagram', 'Instagram', 'mavf_site_setting_social_account_instagram', 'mav_admin_page_site_setting', 'mavsec_site_setting_social_account' );

function mavf_site_setting_social_account_instagram() {
    $mav_saved_value = esc_attr( get_option('mav_setting_social_account_instagram') );
    printf( '<input type="text" name="mav_setting_social_account_instagram" value="%1$s" placeholder="Instagram account"/>', $mav_saved_value );
}