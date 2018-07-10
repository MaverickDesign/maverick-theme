<?php
/**
 * @package maverick-theme
 */

function mavf_admin_site_setting_options() {

    add_settings_section( 'mavsec_site_setting_brand', 'Brand', 'mavf_site_setting_brand', 'mav_admin_page_site_setting' );

    /**
     * Brand Settings
     */

    register_setting( 'mavog_site_setting', 'mav_setting_brand_logo' );
    register_setting( 'mavog_site_setting', 'mav_setting_brand_name' );
    register_setting( 'mavog_site_setting', 'mav_setting_brand_tagline' );
    register_setting( 'mavog_site_setting', 'mav_setting_brand_address' );
    register_setting( 'mavog_site_setting', 'mav_setting_brand_phone' );
    register_setting( 'mavog_site_setting', 'mav_setting_brand_email' );
    register_setting( 'mavog_site_setting', 'mav_setting_brand_website' );

    add_settings_field( 'mavid_site_setting_brand_logo', 'Brand logo', 'mavf_site_setting_brand_logo', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );
    add_settings_field( 'mavid_site_setting_brand_name', 'Brand Name', 'mavf_site_setting_brand_name', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );
    add_settings_field( 'mavid_site_setting_brand_tagline', 'Tagline', 'mavf_site_setting_brand_tagline', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );
    add_settings_field( 'mavid_site_setting_brand_address', 'Address', 'mavf_site_setting_brand_address', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );
    add_settings_field( 'mavid_site_setting_brand_phone', 'Phone', 'mavf_site_setting_brand_phone', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );
    add_settings_field( 'mavid_site_setting_brand_email', 'Email', 'mavf_site_setting_brand_email', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );
    add_settings_field( 'mavid_site_setting_brand_website', 'Website', 'mavf_site_setting_brand_website', 'mav_admin_page_site_setting', 'mavsec_site_setting_brand' );

    /*
        GOOGLE MAP SETTINGS
    */

    add_settings_section( 'mavsec_site_setting_google_map', 'Google Map', 'mavf_site_setting_google_map', 'mav_admin_page_site_setting' );

    register_setting( 'mavog_site_setting', 'mav_setting_goole_map_uri' );
    register_setting( 'mavog_site_setting', 'mav_setting_goole_map_height' );

    add_settings_field( 'mavid_site_setting_goole_map_uri', 'Google Map URI', 'mavf_site_setting_google_map_uri', 'mav_admin_page_site_setting', 'mavsec_site_setting_google_map' );
    add_settings_field( 'mavid_site_setting_goole_map_height', 'Google Map Height', 'mavf_site_setting_google_map_height', 'mav_admin_page_site_setting', 'mavsec_site_setting_google_map' );

    /*
        SOCIAL ACCOUNT SETTINGS
    */
    add_settings_section( 'mavsec_site_setting_social_account', 'Social Accounts', 'mavf_site_setting_social_account', 'mav_admin_page_site_setting' );

    require_once TEMPLATE_DIR.'/inc/admin/mav-admin_site-setting_social-accounts.php';

    /* Facebook App ID */
    add_settings_section( 'mavsec_site_setting_facebook_app', 'Facebook App', 'mavf_site_setting_facebook_app', 'mav_admin_page_site_setting' );

    register_setting( 'mavog_site_setting', 'mav_setting_facebook_app_id' );
    add_settings_field( 'mavid_site_setting_facebook_app_id', 'Facebook App ID', 'mavf_site_setting_facebook_app_id', 'mav_admin_page_site_setting', 'mavsec_site_setting_facebook_app' );

    /* Google Analytic */
    add_settings_section( 'mavsec_site_setting_google_analytics', 'Google Analytics', 'mavf_site_setting_google_analytics', 'mav_admin_page_site_setting' );
    register_setting( 'mavog_site_setting', 'mav_setting_google_analytics_id' );
    add_settings_field( 'mavid_site_setting_google_analytics_id', 'Google Analytics ID', 'mavf_site_setting_google_analytics_id', 'mav_admin_page_site_setting', 'mavsec_site_setting_google_analytics' );

    /* Hero Slider Category ID */
    add_settings_section( 'mavsec_site_setting_hero_slider' , 'Hero Slider' , 'mavf_site_setting_hero_slider' , 'mav_admin_page_site_setting' );
    register_setting( 'mavog_site_setting' , 'mav_setting_hero_slider_id');
    add_settings_field( 'mavid_site_setting_hero_slider_id' , 'Default category ID' , 'mavf_site_setting_hero_slider_id' , 'mav_admin_page_site_setting', 'mavsec_site_setting_hero_slider' );

    // Website maintenance section
    add_settings_section( 'mavsec_site_setting_maintenance' , 'Website Maintenance' , 'mavf_site_setting_sec_maintenance' , 'mav_admin_page_site_setting' );
    // Eneable maintenance mode
    register_setting( 'mavog_site_setting', 'mav_setting_maintenance' );
    add_settings_field( 'mavid_site_setting_maintenance', 'Enable maintenance mode', 'mavf_site_setting_maintenance', 'mav_admin_page_site_setting', 'mavsec_site_setting_maintenance' );
    // Maintenance time
    register_setting( 'mavog_site_setting', 'mav_setting_maintenance_time' );
    add_settings_field( 'mavid_site_setting_maintenance_time', 'Maintenance time', 'mavf_site_setting_maintenance_time', 'mav_admin_page_site_setting', 'mavsec_site_setting_maintenance' );

}

add_action( 'admin_init' , 'mavf_admin_site_setting_options' );

function mavf_admin_page_site_setting() {
    require_once TEMPLATE_DIR . '/inc/admin/mav-admin-site-setting.php';
}

/**
 * BRAND SETTING FUNCTIONS
 */

function mavf_site_setting_brand() {
    _e('Enter brand info','maverick-theme');
}

function mavf_site_setting_brand_logo() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_logo') );
	if (empty($mavSavedValue)) {
		echo '
		<input id="mavid-btn-upload-brand-logo" type="button" value="Upload Brand logo">
		<input id="mavid-brand-logo" type="hidden" name="mav_setting_brand_logo" value="">
		';
	} else {
		echo '
		<input id="mavid-btn-upload-brand-logo" type="button" value="Replace Brand logo">
		<input id="mavid-btn-remove-brand-logo" type="button" value="Remove">
		<input id="mavid-brand-logo" type="hidden" name="mav_setting_brand_logo" value="'.$mavSavedValue.'">
		';
	}
}

function mavf_site_setting_brand_name() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_name') );
    if( empty($mavSavedValue) ):
        $mavSavedValue = get_bloginfo( 'name' );
    endif;
    printf( '<input type="text" name="mav_setting_brand_name" value="%s" placeholder="Brand name"/>', $mavSavedValue );
}

function mavf_site_setting_brand_tagline() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_tagline') );
    if( empty($mavSavedValue) ):
        $mavSavedValue = get_bloginfo( 'description' );
    endif;
    printf( '<input type="text" name="mav_setting_brand_tagline" value="%s" placeholder="Tagline"/>', $mavSavedValue );
}

function mavf_site_setting_brand_address() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_address') );
    printf( '<input type="text" name="mav_setting_brand_address" value="%s" placeholder="Address"/>', $mavSavedValue );
}

function mavf_site_setting_brand_phone() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_phone') );
    printf( '<input type="text" name="mav_setting_brand_phone" value="%s" placeholder="Phone"/>', $mavSavedValue );
}

function mavf_site_setting_brand_email() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_email') );
    printf( '<input type="text" name="mav_setting_brand_email" value="%s" placeholder="Email"/>', $mavSavedValue );
}

function mavf_site_setting_brand_website() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_website') );
    if( empty($mavSavedValue) ):
        $mavSavedValue = get_bloginfo( 'url' );
    endif;
    printf( '<input type="text" name="mav_setting_brand_website" value="%s" placeholder="Website"/>', $mavSavedValue );
}

/*
    GOOGLE MAP SETTING FUNCTIONS
*/

function mavf_site_setting_google_map() {
    echo 'Enter Google Map settings';
}

function mavf_site_setting_google_map_uri() {
    $mavSavedValue = esc_attr( get_option('mav_setting_goole_map_uri') );
    printf( '<input type="text" name="mav_setting_goole_map_uri" value="%s" placeholder="Google Map URI"/>', $mavSavedValue );
}

function mavf_site_setting_google_map_height() {
    $mavSavedValue = esc_attr( get_option('mav_setting_goole_map_height') );
    printf( '<input type="text" name="mav_setting_goole_map_height" value="%s" placeholder="Map height in vw"/>', $mavSavedValue );
}

/**
 * SOCIAL ACCOUNT FUNCTIONS
 */

function mavf_site_setting_social_account() {
    echo 'Enter social accounts';
}


/*
    FACEBOOK APP FUNCTIONS
*/
function mavf_site_setting_facebook_app() {

}

function mavf_site_setting_facebook_app_id() {
    $mavSavedValue = esc_attr( get_option('mav_setting_facebook_app_id') );
    printf( '<input type="text" name="mav_setting_facebook_app_id" value="%s" placeholder="Facebook App ID"/>', $mavSavedValue );
}

/*
    GOOGLE ANALYTIC
*/

function mavf_site_setting_google_analytics() {

}

function mavf_site_setting_google_analytics_id() {
    $mavSavedValue = esc_attr( get_option('mav_setting_google_analytics_id') );
    printf( '<input type="text" name="mav_setting_google_analytics_id" value="%s" placeholder="Google Analytics ID"/>', $mavSavedValue );
}

/**
 * Hero Slider Settings
 */

function mavf_site_setting_hero_slider() {

}

function mavf_site_setting_hero_slider_id() {
    $mavSavedValue = esc_attr( get_option('mav_setting_hero_slider_id') );
    printf( '<input type="text" name="mav_setting_hero_slider_id" value="%1$s" placeholder="Category ID"/>', $mavSavedValue );
}

/**
 * Website maintenance settings
 */
function mavf_site_setting_sec_maintenance() {
    _e('Enter website maintenance setting','maverick-theme');
}

function mavf_site_setting_maintenance() {
    $mavSavedValue = esc_attr( get_option('mav_setting_maintenance') );
	$mavChecked = ( @$mavSavedValue == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="mavid-maintenance" name="mav_setting_maintenance" value="1" '.$mavChecked.'/></label>';
}

function mavf_site_setting_maintenance_time(){
    $mavSavedValue = esc_attr( get_option('mav_setting_maintenance_time') );
    printf( '<input type="text" name="mav_setting_maintenance_time" value="%1$s" placeholder="dd/mm/yyyy"/>', $mavSavedValue );
}