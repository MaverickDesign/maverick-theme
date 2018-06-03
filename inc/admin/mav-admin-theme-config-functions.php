<?php
/*
 @package mavericktheme
 */

function mavf_admin_theme_config_options() {
	register_setting('mavog_theme_config' , 'mav_setting_post_format');
    add_settings_field( 'mavid_theme_config_theme_support_post_format', 'Post Formats', 'mavf_theme_config_theme_support_post_format', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

    register_setting( 'mavog_theme_config', 'mav_setting_grid_system' );
    add_settings_field( 'mavid_theme_config_grid_system', 'Grid System', 'mavf_theme_config_grid_system', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

	register_setting('mavog_theme_config' , 'mav_setting_theme_language');
	add_settings_field( 'mavid_theme_config_theme_language', 'Theme language', 'mavf_theme_config_theme_language', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

	register_setting('mavog_theme_config' , 'mav_setting_duo_language');
	add_settings_field( 'mavid_theme_config_duo_language', 'Enable Duo Language', 'mavf_theme_config_duo_language', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

	register_setting('mavog_theme_config' , 'mav_setting_vi_url');
	add_settings_field( 'mavid_theme_config_vi_url', 'Vietnamese Site URL', 'mavf_theme_config_vi_url', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

	register_setting('mavog_theme_config' , 'mav_setting_en_url');
	add_settings_field( 'mavid_theme_config_en_url', 'English Site URL', 'mavf_theme_config_en_url', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

    add_settings_section( 'mavsec_theme_config_theme_support', 'Theme Supports', 'mavf_theme_config_theme_support', 'mav_admin_page_theme_config' );
} // mavf_admin_theme_config_options

add_action( 'admin_init' , 'mavf_admin_theme_config_options' );

function mavf_admin_page_theme_config() {
    require_once get_template_directory() . '/inc/admin/mav-admin-theme-config.php';
}

function mavf_theme_config_theme_support() {
	_e('Active & Deactive Theme Supports' , 'mavericktheme');
}

/**
 * Support Post Formats
 */
function mavf_theme_config_theme_support_post_format() {
	$mavSavedValue = get_option('mav_setting_post_format');
	$mavPostFormats = array('aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio' , 'chat');
	$mavOutput = '';
	foreach ($mavPostFormats as $mavPostFormat) {
		$mavChecked = ( @$mavSavedValue[$mavPostFormat] == 1 ? 'checked' : '');
		$mavOutput .= '<label><input type="checkbox" id="post-format-'.$mavPostFormat.'" name="mav_setting_post_format['.$mavPostFormat.']" value="1" '.$mavChecked.'/> '.$mavPostFormat.'</label><br>';
	}
	echo $mavOutput;
} //mavf_theme_config_theme_support_post_format

/**
 * Grid System
 */
function mavf_theme_config_grid_system() {
    $mavSavedValue = esc_attr( get_option('mav_setting_grid_system') );

	$mavChecked960  = '';
	$mavChecked1200 = '';
	$mavChecked1440 = '';

    if (empty($mavSavedValue)) {
        $mavChecked1200 = 'checked';
    }

	switch ($mavSavedValue) {
		case 960:
			$mavChecked960 = 'checked';
			break;
		case 1200:
			$mavChecked1200 = 'checked';
			break;
		case 1440:
			$mavChecked1440 = 'checked';
			break;
	}

	echo '
			<fieldset>
				<label><input type="radio" name="mav_setting_grid_system" value="960" '.$mavChecked960.'/> 960px - 12 Columns</label><br />
				<label><input type="radio" name="mav_setting_grid_system" value="1200" '.$mavChecked1200.'/>1200px  - 15 Columns</label><br />
				<label><input type="radio" name="mav_setting_grid_system" value="1440" '.$mavChecked1440.'/>1440px - 18 Columns</label><br />
			</fieldset>
		  ';
} // mavf_theme_config_grid_system

/**
 * Theme Language
 */
function mavf_theme_config_theme_language() {
	$mavSavedValue = esc_attr( get_option('mav_setting_theme_language') );

	$mavEN = '';
	$mavVI = '';

    if (empty($mavSavedValue)) {
        $mavVI = 'checked';
    }

	switch ($mavSavedValue) {
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
} // mavf_theme_config_theme_language

function mavf_theme_config_duo_language() {
    $mavSavedValue = esc_attr( get_option('mav_setting_duo_language') );
	$mavChecked = ( @$mavSavedValue == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="mavid-duo-language" name="mav_setting_duo_language" value="1" '.$mavChecked.'/></labe;>';
}

function mavf_theme_config_vi_url() {
	$mavSavedValue = esc_attr( get_option('mav_setting_vi_url') );
    printf( '<input type="text" name="mav_setting_vi_url" value="%s" placeholder="Vietnamese Site URL"/>', $mavSavedValue );
}

function mavf_theme_config_en_url() {
	$mavSavedValue = esc_attr( get_option('mav_setting_en_url') );
    printf( '<input type="text" name="mav_setting_en_url" value="%s" placeholder="English Site URL"/>', $mavSavedValue );
}