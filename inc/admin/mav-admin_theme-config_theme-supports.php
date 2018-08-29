<?php
/**
 * @package maverick-theme
 */

add_settings_section(
    'mavsec_theme_config_theme_support',
    __('Hỗ trợ các tính năng', 'maverick-theme'),
    'mavf_theme_config_theme_support',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_theme_support()
{
	_e('Thiết lập các tính năng cho Maverick Theme', 'maverick-theme');
}