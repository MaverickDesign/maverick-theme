<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_theme_config_sec_breadcrumbs',
    __('Breadcrumbs', 'mavericktheme'),
    'mavf_theme_config_sec_breadcrumbs',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_sec_breadcrumbs()
{
    _e('Breadcrumbs', 'mavericktheme');
}

register_setting('mavog_theme_config', 'mav_setting_breadcrumbs');
add_settings_field(
    'mavid_theme_setting_breadcrumbs',
    __('Kích hoạt Breadcrumbs', 'mavericktheme'),
    'mavf_theme_config_breadcrumbs',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_sec_breadcrumbs'
);

function mavf_theme_config_breadcrumbs()
{
    $mav_saved_value = get_option('mav_setting_breadcrumbs');
    $mavPositions = array(
        'header',
        'footer'
    );
    echo '<div class="mav-grid" data-grid-gap="">';
    $mavOutput = '';
    foreach ($mavPositions as $mavPosition) {
        $mavChecked = ( @$mav_saved_value[$mavPosition] == 1 ? 'checked' : '');
        $mavOutput .= '<label><input type="checkbox" id="mavid-breadcrumbs-'.$mavPosition.'" name="mav_setting_breadcrumbs['.$mavPosition.']" value="1" '.$mavChecked.'/> '.ucfirst($mavPosition).'</label>';
    }
    echo $mavOutput;
    echo '</div>';
}
