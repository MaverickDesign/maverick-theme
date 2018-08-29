<?php
/**
 * @package maverick-theme
 */

register_setting('mavog_theme_config', 'mav_setting_ajax_load_posts');

add_settings_field(
    'mavid_theme_setting_ajax_load_posts',
    __('Tải bài viết theo dạng AJAX', 'maverick-theme'),
    'mavf_theme_config_ajax_load_posts',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_ajax_load_posts()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_ajax_load_posts'));
    $mavChecked = (@$mav_saved_value == 1 ? 'checked' : '');
    printf('<input id="mavid-ajax-load-posts" type="checkbox" name="mav_setting_ajax_load_posts" value="1" %1$s/>', $mavChecked);
}