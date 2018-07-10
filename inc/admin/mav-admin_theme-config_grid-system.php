<?php
/**
 * @package maverick-theme
 */

register_setting( 'mavog_theme_config', 'mav_setting_grid_system' );
add_settings_field( 'mavid_theme_config_grid_system', 'Grid System', 'mavf_theme_config_grid_system', 'mav_admin_page_theme_config', 'mavsec_theme_config_theme_support' );

function mavf_theme_config_grid_system() {
    $mavSavedValue = esc_attr( get_option('mav_setting_grid_system') );

	$mavChecked960  = '';
	$mavChecked1200 = '';
	$mavChecked1440 = '';
	$mavChecked1680 = '';

    if (empty($mavSavedValue)) {
        $mavChecked1680 = 'checked';
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
		case 1680:
			$mavChecked1680 = 'checked';
			break;
	}

	echo '
			<fieldset>
				<label><input type="radio" name="mav_setting_grid_system" value="960" '.$mavChecked960.'/>960px</label><br />
				<label><input type="radio" name="mav_setting_grid_system" value="1200" '.$mavChecked1200.'/>1200px</label><br />
				<label><input type="radio" name="mav_setting_grid_system" value="1440" '.$mavChecked1440.'/>1440px</label><br />
				<label><input type="radio" name="mav_setting_grid_system" value="1680" '.$mavChecked1680.'/>1680px</label><br />
			</fieldset>
		  ';
}