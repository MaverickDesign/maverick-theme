<?php
/**
 * @package mavericktheme
 */

register_setting('mavog_theme_config', 'mav_setting_grid_system');
add_settings_field(
    'mavid_theme_config_grid_system',
    __('Hệ thống lưới', 'mavericktheme'),
    'mavf_theme_config_grid_system',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_support'
);

function mavf_theme_config_grid_system()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_grid_system'));

    $mavGrids = [960,1200,1400,1680];

    echo '<fieldset class="mav-grid">';
    foreach ($mavGrids as $mavGrid) {
        $mavChecked = (@$mav_saved_value == $mavGrid) ? 'checked' : '';
        printf(
            '<label><input type="radio" name="mav_setting_grid_system" value="%1$d" %2$s>%1$d px</label>',
            $mavGrid, $mavChecked
        );
    }
    echo '</fieldset>';

    printf('<span class="mav-admin-desc">%1$s</span>', __('Chiều rộng tối đa của website, đơn vị pixel.', 'mavericktheme'));
}
