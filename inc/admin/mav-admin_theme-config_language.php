<?php
/**
 * @package mavericktheme
 */

register_setting('mavog_theme_config', 'mav_setting_theme_language');
add_settings_field(
    'mavid_theme_config_theme_language',
    'Theme language',
    'mavf_theme_config_theme_language',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_support'
);

register_setting('mavog_theme_config', 'mav_setting_duo_language');
add_settings_field(
    'mavid_theme_config_duo_language',
    'Enable Duo Language',
    'mavf_theme_config_duo_language',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_support'
);

register_setting('mavog_theme_config' , 'mav_setting_vi_url');
add_settings_field( 'mavid_theme_config_vi_url', 'Vietnamese Site URL', 'mavf_theme_config_vi_url', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

register_setting('mavog_theme_config' , 'mav_setting_en_url');
add_settings_field( 'mavid_theme_config_en_url', 'English Site URL', 'mavf_theme_config_en_url', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

/**
 * Theme Language
 */
function mavf_theme_config_theme_language() {
    $mav_saved_value = esc_attr( get_option('mav_setting_theme_language') );

    $mavEN = '';
    $mavVI = '';

    if (empty($mav_saved_value)) {
        $mavVI = 'checked';
    }

    switch ($mav_saved_value) {
        case 'vi':
            $mavVI = 'checked';
            break;
        case 'en':
            $mavEN = 'checked';
            break;
    }
    echo '
        <fieldset>
            <label><input type="radio" name="mav_setting_theme_language" value="vi" '.$mavVI.'/>Vietnamese</label><br />
            <label><input type="radio" name="mav_setting_theme_language" value="en" '.$mavEN.'/> English</label><br />
        </fieldset>
        ';
}

function mavf_theme_config_duo_language() {
    $mav_saved_value = esc_attr( get_option('mav_setting_duo_language') );
    $mavChecked = ( @$mav_saved_value == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="mavid-duo-language" name="mav_setting_duo_language" value="1" '.$mavChecked.'/></label>';
}

function mavf_theme_config_vi_url() {
    $mav_saved_value = esc_attr( get_option('mav_setting_vi_url') );
    printf( '<input type="text" name="mav_setting_vi_url" value="%s" placeholder="Vietnamese Site URL"/>', $mav_saved_value );
}

function mavf_theme_config_en_url() {
    $mav_saved_value = esc_attr( get_option('mav_setting_en_url') );
    printf( '<input type="text" name="mav_setting_en_url" value="%s" placeholder="English Site URL"/>', $mav_saved_value );
}