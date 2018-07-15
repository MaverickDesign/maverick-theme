<?php
/**
 * @package maverick-theme
 */

register_setting('mavog_theme_config','mav_setting_blog_page_columns');
add_settings_field(
	'mavid_theme_setting_blog_page_columns',
	__('Số cột hiển thị','maverick-theme'),
	'mavf_theme_config_blog_page_columns',
	'mav_admin_page_theme_config',
	'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_columns() {
	$mavSavedValue = esc_attr( get_option('mav_setting_blog_page_columns') );

	printf( '<input type="range" name="mav_setting_blog_page_columns" value="%1$d" min="1" max="4"/>', $mavSavedValue );

	echo '
	<ul class="mav-range-slider-ctn">
		<li>1</li>
		<li>2</li>
		<li>3</li>
		<li>4</li>
	</ul>
	';

	printf('<span class="mav-admin-desc">%1$s</span>',__('Tùy chọn này giới hạn từ 1 đến 4 để đảm bảo tính mỹ thuật cho bố cục website.','maverick-theme'));
}