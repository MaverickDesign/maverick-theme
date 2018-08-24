<?php
/**
 * @package maverick-theme
 */

 add_settings_section(
    'mavsec_theme_config_sec_breadcrumbs',
    __('Breadcrumbs','maverick-theme'),
    'mavf_theme_config_sec_breadcrumbs',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_sec_breadcrumbs(){
   _e('Breadcrumbs','maverick-theme');
}

register_setting('mavog_theme_config','mav_setting_breadcrumbs');
add_settings_field(
	'mavid_theme_setting_breadcrumbs',
	__('Kích hoạt Breadcrumbs','maverick-theme'),
	'mavf_theme_config_breadcrumbs',
	'mav_admin_page_theme_config',
	'mavsec_theme_config_sec_breadcrumbs'
);

function mavf_theme_config_breadcrumbs(){
    $mavSavedValue = get_option( 'mav_setting_breadcrumbs' );
    $mavPositions = array(
        'header',
        'footer'
    );
	echo '<div class="mav-grid" data-grid-gap="">';
		$mavOutput = '';
		foreach ($mavPositions as $mavPosition) {
			$mavChecked = ( @$mavSavedValue[$mavPosition] == 1 ? 'checked' : '');
			$mavOutput .= '<label><input type="checkbox" id="mavid-breadcrumbs-'.$mavPosition.'" name="mav_setting_breadcrumbs['.$mavPosition.']" value="1" '.$mavChecked.'/> '.ucfirst($mavPosition).'</label>';
		}
		echo $mavOutput;
	echo '</div>';
}
